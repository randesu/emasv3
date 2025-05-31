<?php

namespace App\Livewire\Account\MyProfile;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
//use Illuminate\Validation\Rule;

class Index extends Component
{
    use WithFileUploads;

    public $fotoprofil;
    public $nama_pembeli;
    public $username_pembeli;
    public $image;
    
    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->nama_pembeli = auth()->guard('customer')->user()->nama_pembeli;
        $this->username_pembeli = auth()->guard('customer')->user()->username_pembeli;
        $this->image = auth()->guard('customer')->user()->image;
    }
    
    /**
     * rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:81920', // Maksimal 8MB
            'nama_pembeli' => 'required',
            'username_pembeli' => [
            'required',
            Rule::unique('customers', 'username_pembeli')->ignore(auth()->guard('customer')->user()->id),
           ],
        ];
    }


    // public function rules()
    // {
    //     return [
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'nama_pembeli'  => 'required',
    //         'username_pembeli' => 'required|username_pembeli|unique:username_pembeli,username_pembeli,'. auth()->guard('customer')->user()->id,
    //     ];
    // }

    public function update()
{
    $this->validate();

    $profile = Customer::findOrFail(auth()->guard('customer')->user()->id);

    // hanya jika file valid dan di-upload
    if ($this->image && $this->image->isValid()) {
        $filename = $this->image->hashName();
        $this->image->storeAs('avatars', $filename, 's3');

        $profile->update([
            'nama_pembeli'       => $this->nama_pembeli,
            'username_pembeli'   => $this->username_pembeli,
            'image'              => $filename,
        ]);
    } else {
        $profile->update([
            'nama_pembeli'       => $this->nama_pembeli,
            'username_pembeli'   => $this->username_pembeli,
        ]);
    }

    // $this->reset('image'); // RESET FILE INPUT

    session()->flash('success', 'Update Profil Berhasil');
            return $this->redirect('/account/my-profile', navigate: true);

}



    // public function update()
    // {
    //     // Validasi input
    //     $this->validate();

    //     // Cek apakah ada gambar yang di-upload
    //     if ($this->image) {
    // $filename = $this->image->hashName(); // atau getClientOriginalName() jika kamu ingin nama asli
    // $this->image->storeAs('avatars', $filename, 's3');

    // $profile = Customer::findOrFail(auth()->guard('customer')->user()->id);
    // $profile->update([
    //     'nama_pembeli'  => $this->nama_pembeli,
    //     'username_pembeli' => $this->username_pembeli,
    //     'image' => $filename, // hanya simpan nama file, tanpa path
    // ]);

    //     } else {
    //         // Update tanpa gambar
    //         $profile = Customer::findOrFail(auth()->guard('customer')->user()->id);
    //         $profile->update([
    //             'nama_pembeli'  => $this->nama_pembeli,
    //             'username_pembeli' => $this->username_pembeli,
    //         ]);
    //     }

    //     // Kirim pesan sukses
    //     session()->flash('success', 'Update Profil Berhasil');

    //     // redirect to the desired page
    //     return $this->redirect('/account/my-profile', navigate: true);
    // }

    public function render()
    {
        return view('livewire.account.my-profile.index');
    }
}