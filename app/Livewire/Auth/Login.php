<?php

namespace App\Livewire\Auth;

use App\Models\produk;
use Livewire\Component;

class Login extends Component
{
    public $username_pembeli;
    public $password;
        
    /**
     * rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'username_pembeli' => ['required', 'username_pembeli'],
            'password' => ['required'],
        ];
    }

    public function mount()
    {
        // redirect if user is already logged in
        if(auth()->guard('customer')->check()) {
            return $this->redirect('/account/my-profile', navigate: true);
        }
    }

    /**
     * login
     *
     * @return void
     */
    public function login()
    {
        // validate the input
        // $this->validate();

        // attempt to login
        if (auth()->guard('customer')->attempt([
            'username_pembeli' => $this->username_pembeli,
            'password' => $this->password,
        ])) {
            // session flash
            session()->flash('success', 'Login Berhasil');

            // redirect to the desired page
            return $this->redirect('/account/my-profile', navigate: true);
        }

        // flash error message if login fails
        session()->flash('error', 'Periksa email dan password Anda.');

        // redirect to the desired page
        return $this->redirect('/login', navigate: true);

        
    }

    public function render()
    {
        return view('livewire.auth.login', [
             'produk' => produk::latest()->get(),
        ]);
    }
}

