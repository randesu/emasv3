<?php

namespace App\Livewire\Web\Checkout;

use Livewire\Component;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\DB;
use App\Models\keranjang;
use App\Models\TransactionV2;

class BtnCheckout extends Component
{
    public $province_id;
    public $city_id;
    public $address;

    public $selectCourier;
    public $selectService;
    public $selectCost;

    public $totalWeight;
    public $totalPrice;
    public $grandTotal;

    public $response = [];
    public $loading;

    public function __construct()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');
    }

    public function storeCheckout()
    {
        $this->loading = true;

        $customer = auth()->guard('customer')->user();

        if (!$customer || !$this->address || !$this->totalPrice) {
            session()->flash('error', 'Data tidak lengkap. Silakan periksa kembali.');
            $this->loading = false;
            return;
        }

        try {
            DB::transaction(function () use ($customer) {
                $invoice = 'INV-' . time() . '-' . mt_rand(1000, 9999);

                $carts = keranjang::where('id_pembeli', $customer->id)->with('produk')->get();

                $item_details = [];
                foreach ($carts as $cart) {
                    $item_details[] = [
                        'id'       => $cart->produk->id,
                        'price'    => $cart->produk->harga,
                        'quantity' => $cart->jumlah_beli,
                        'name'     => $cart->produk->nama_barang,
                    ];
                }

                $payload = [
                    'transaction_details' => [
                        'order_id'     => $invoice,
                        'gross_amount' => $this->totalPrice,
                    ],
                    'customer_details' => [
                        'first_name'       => $customer->nama_pembeli,
                        'email'            => 'user_' . $customer->id . '@example.com',
                        'shipping_address' => $this->address,
                    ],
                    'item_details' => $item_details,
                ];

                $snapToken = Snap::getSnapToken($payload);

                $transaction = TransactionV2::create([
                    'customer_id' => $customer->id,
                    'invoice'     => $invoice,
                    'address'     => $this->address,
                    'total'       => $this->totalPrice,
                    'status'      => 'PENDING',
                    'snap_token'  => $snapToken,
                ]);

                foreach ($carts as $cart) {
                    $transaction->transactionDetails()->create([
                        'product_id' => $cart->produk->id,
                        'qty'        => $cart->jumlah_beli,
                        'price'      => $cart->produk->harga,
                    ]);
                }

                keranjang::where('id_pembeli', $customer->id)->delete();

                $this->response['snap_token'] = $snapToken;
                $this->loading = false;
            });

            session()->flash('success', 'Silahkan lakukan pembayaran untuk melanjutkan proses checkout.');
            return $this->redirect('/account/my-orders/' . $this->response['snap_token'], navigate: true);

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat memproses checkout. Silakan coba lagi.');
            $this->loading = false;
            return;
        }
    }

    public function render()
    {
        return view('livewire.web.checkout.btn-checkout');
    }
}
