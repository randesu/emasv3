<?php

namespace App\Livewire\Web\Checkout;

use Midtrans\Snap;
use App\Models\Cart;
use Livewire\Component;
use App\Models\keranjang;
use App\Models\Transaction;
use App\Models\TransactionV2;
use Illuminate\Support\Facades\DB;

class BtnCheckout extends Component
{
    public $province_id ;
    public $city_id ;
    public $address;

    public $selectCourier;
    public $selectService ;
    public $selectCost;

    public $totalWeight;
    public $totalPrice;
    public $grandTotal ;

    public $response;
    public $loading;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        // Set midtrans configuration
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized  = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds        = config('midtrans.is_3ds');
    }

    // public function mount($selectCourier = null, $selectService = null, $selectCost = null)
    // {
    //     $this->selectCourier = $selectCourier;
    //     $this->selectService = $selectService;
    //     $this->selectCost = $selectCost;
    // }
    
    /**
     * storeCheckout
     *
     * @return void
     */
    public function storeCheckout()
    {
        // Set loading
        $this->loading = true;

        $customer = auth()->guard('customer')->user();

        // Validasi awal
        if (!$customer || !$this->address || !$this->totalPrice) {
            session()->flash('error', 'Data tidak lengkap. Silakan periksa kembali.');
            return;
        }

        try {
            DB::transaction(function () use ($customer) {
                
                // Buat kode invoice
                $invoice = 'INV-' . mt_rand(1000, 9999);

                // Buat transaksi
                $transaction = TransactionV2::create([
                    'customer_id' => $customer->id,
                    'invoice'     => $invoice,
                    'province_id' => $this->province_id,
                    'city_id'     => $this->city_id,
                    'address'     => $this->address,
                    'weight'      => $this->totalWeight,
                    'total'       => $this->totalPrice,
                    'status'      => 'PENDING',
                ]);

                // Buat data pengiriman
                $transaction->shipping()->create([
                    'shipping_courier' => $this->selectCourier,
                    'shipping_service' => $this->selectService,
                    'shipping_cost'    => $this->selectCost,
                ]);

                // Detail item
                $item_details = [];
                $carts = keranjang::where('id_pembeli', $customer->id)->with('produk')->get();

                foreach ($carts as $cart) {
                    // Tambahkan detail transaksi
                    $transaction->transactionDetails()->create([
                        'id_produk' => $cart->produk->id,
                        'qty'        => $cart->jumlah_beli,
                        'price'      => $cart->produk->harga,
                    ]);

                    $item_details[] = [
                        'id'       => $cart->produk->id,
                        'price'    => $cart->produk->harga,
                        'quantity' => $cart->jumlah_beli,
                        'name'     => $cart->produk->nama_barang,
                    ];
                }

                // Tambahkan ongkos kirim ke item details
                $item_details[] = [
                    'id'       => 'shipping',
                    'price'    => $this->selectCost,
                    'quantity' => 1,
                    'name'     => 'Ongkos Kirim:',
                ];

                // Hapus keranjang setelah checkout
                keranjang::where('id_pembeli', $customer->id)->delete();

                // Payload untuk Midtrans
                $payload = [
                    'transaction_details' => [
                        'order_id'     => $invoice,
                        'gross_amount' => $this->totalPrice,
                    ],
                    'customer_details' => [
                        'first_name'       => $customer->nama_pembeli,
                        'email'            => $customer->nama_pembeli,
                        'shipping_address' => $this->address,
                    ],
                    'item_details' => $item_details,
                ];

                // Dapatkan token snap Midtrans
                $snapToken = Snap::getSnapToken($payload);

                // Simpan snap token ke transaksi
                $transaction->snap_token = $snapToken;
                $transaction->save();

                // Simpan respons snap token
                $this->response['snap_token'] = $snapToken;

                // Set loading
                $this->loading = false;
            });

            // Flash session dan redirect
            session()->flash('success', 'Silahkan lakukan pembayaran untuk melanjutkan proses checkout.');
            return $this->redirect('/account/my-orders/' . $this->response['snap_token'], navigate: true);
            
        } catch (\Exception $e) {
            // Tangani error
            session()->flash('error', 'Terjadi kesalahan saat memproses checkout. Silakan coba lagi.');

            // Set loading
            $this->loading = false;
            return;
        }
    }

    public function render()
    {
        return view('livewire.web.checkout.btn-checkout');
    }
}