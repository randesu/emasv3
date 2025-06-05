<?php

namespace App\Livewire\Account\Password;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Validation\Rule;

class Index extends Component
{
    public $password;
    public $password_confirmation;
    public $nama_pembeli;
    public $username_pembeli;
    public $image;

    public function mount()
    {
        $user = auth()->guard('customer')->user();
        $this->image = $user->image;
        $this->nama_pembeli = auth()->guard('customer')->user()->nama_pembeli;
        $this->username_pembeli = auth()->guard('customer')->user()->username_pembeli;
    }

    public function rules()
{
    return [
        'password'  => 'required|confirmed',
    ];
}
    //  public function rules()
    // {
    //     return [
    //         'password'  => 'required|confirmed',
    //         'nama_pembeli' => 'required',
    //         'username_pembeli' => [
    //             'required',
    //             Rule::unique('customers', 'username_pembeli')->where(function ($query) {
    //                 return $query->where('id', auth()->guard('customer')->user()->id);
    //             }),
    //         ],
    //     ];
    // }

    /**
     * rules
     *
     * @return void
     */
    // public function rules()
    // {
    //     return [
    //         'password'  => 'required|confirmed',
    //     ];
    // }
    
    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        // Validasi input
        $this->validate();

        //update
        $customer = Customer::where('id', auth()->guard('customer')->user()->id)->first();
        $customer->update([
            'password'  => bcrypt($this->password)
        ]);

        // session flash
        session()->flash('success', 'Update Password Berhasil');

        // redirect to the desired page
        return $this->redirect('/account/password', navigate: true);
    }

    public function render()
    {
        return view('livewire.account.password.index');
    }
}