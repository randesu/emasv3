<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Customer;

class Register extends Component
{
    public $name;
    public $email;
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
            'password_pembeli' => ['required', 'confirmed'],
        ];
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
            'nama_pembeli'      => $this->name,
            'username_pembeli'     => $this->email,
            'password_pembeli'  => $this->password,
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