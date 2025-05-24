<?php

namespace App\Livewire\Auth;

use App\Models\produk;
use Livewire\Component;
use App\Models\Customer;

class Register extends Component
{
    public $nama_pembeli;
    public $username_pembeli;
    public $password;
    public $password_confirmation;
    
    /**
     * rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'nama_pembeli' => ['required'],
            'username_pembeli' => ['required'],
            'password' => ['required', 'confirmed'],
        ];
    }
    
    public function mount()
    {
        // redirect if user is already logged in
        if(auth()->guard('customer')->check()) {
            return $this->redirect('/account/my-orders', navigate: true);
        }
    }
    /**
     * register
     *
     * @return void
     */
    public function register()
    {
        //validate
        $this->validate();

        //create customer
        Customer::create([
            'nama_pembeli'      => $this->nama_pembeli,
            'username_pembeli'     => $this->username_pembeli,
            'password'  => bcrypt($this->password),
        ]);

        //session flash
        session()->flash('success', 'Register Berhasil, silahkan login');

        //redirect
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        $produk = produk::latest()->get();
        $randomProduk = $produk->random(); // Ambil satu produk secara acak

        return view('livewire.auth.register', [
            'produk' => $produk,
            'randomProduk' => $randomProduk,
        ]);
    }
}