<?php

namespace App\Livewire\Web\Checkout;

use Livewire\Component;
use App\Models\Province;
use App\Models\keranjang;

class Index extends Component
{
    public $address;
    public $province_id;
    public $city_id;

    public $loading  = false;
    public $showCost = false;
    public $costs;

    public $selectCourier = '';
    public $selectService = '';
    public $selectCost = 0;

    public $grandTotal = 0;

    /**
     * getCartsData
     *
     * @return void
     */
    public function getCartsData()
    {
        //get carts by customer
        $carts = keranjang::query()
            ->with('produk')
            ->where('id_pembeli', auth()->guard('customer')->user()->id)
            ->latest()
            ->get();

        // Menghitung total berat
        // $totalWeight = $carts->sum(function ($cart) {
        //     return $cart->produk->harga * $keranjang->jumlah_beli;
        // });

        // Menghitung total harga
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->produk->harga * $cart->jumlah_beli;
        });

        // Return as an array
        return [
            //'totalWeight' => $totalWeight,
            'totalPrice'  => $totalPrice,
        ];
    }

    public function getServiceAndCost()
    {
        // Pecah data menjadi nilai cost dan service
        //[$cost, $service] = explode('|', $data);

        // Set nilai cost dan service
        //s

        // Ambil total harga dari cart
        $cartData = $this->getCartsData();

        // Hitung grand total
        $this->grandTotal = $cartData['totalPrice'] ;
        //+ $this->selectCost;
    }


    public function render()
    {
        //get provinces
        $provinces = Province::query()->get();

        $cartData = $this->getCartsData();
        $totalPrice     = $cartData['totalPrice'];
       // $totalWeight    = $cartData['totalWeight'];

        return view('livewire.web.checkout.index', compact('provinces', 'totalPrice'));
    }
}