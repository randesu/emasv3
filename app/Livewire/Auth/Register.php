<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Customer;

class Register extends Component
{
    public $nama_pembeli;
    public $username_pembeli;
    public $password_pembeli;
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
            'password_pembeli' => ['required', 'confirmed'],
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
            'password_pembeli'  => $this->password_pembeli,
        ]);

        //session flash
        session()->flash('success', 'Register Berhasil, silahkan login');

        //redirect
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}