<?php

namespace App\Livewire\Account\MyProfile;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithFileUploads;
//use Illuminate\Validation\Rule;

class Index extends Component
{
    use WithFileUploads;

    public $image;
    public $nama_pembeli;
    public $username_pembeli;
    
    /**
     * mount
     *
     * @return void
     */
    public function mount()
    {
        $this->nama_pembeli = auth()->guard('customer')->user()->nama_pembeli;
        $this->username_pembeli = auth()->guard('customer')->user()->username_pembeli;
    }
    
    /**
     * rules
     *
     * @return void
     */
    // public function rules()
    // {
    //     return [
    //         'nama_pembeli' => 'required',
    //         'username_pembeli' => [
    //             'required',
    //             Rule::unique('customers', 'username_pembeli')->where(function ($query) {
    //                 return $query->where('id', auth()->guard('customer')->user()->id);
    //             }),
    //         ],
    //     ];
    // }


    public function rules()
    {
        return [
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_pembeli'  => 'required',
            'username_pembeli' => 'required|username_pembeli|unique:username_pembeli,username_pembeli,'. auth()->guard('customer')->user()->id,
        ];
    }

    public function update()
    {
        // Validasi input
        $this->validate();

        // Cek apakah ada gambar yang di-upload
        if ($this->image) {
            // Upload gambar
            $imageName = $this->image->hashName();
            $this->image->storeAs('avatars', $imageName);

            // Update data pengguna dengan gambar
            $profile = Customer::findOrFail(auth()->guard('customer')->user()->id);
            $profile->update([
                'nama_pembeli'  => $this->nama_pembeli,
                'username_pembeli' => $this->username_pembeli,
                'image' => $imageName,
            ]);
        } else {
            // Update tanpa gambar
            $profile = Customer::findOrFail(auth()->guard('customer')->user()->id);
            $profile->update([
                'nama_pembeli'  => $this->nama_pembeli,
                'username_pembeli' => $this->username_pembeli,
            ]);
        }

        // Kirim pesan sukses
        session()->flash('success', 'Update Profil Berhasil');

        // redirect to the desired page
        return $this->redirect('/account/my-profile', navigate: true);
    }

    public function render()
    {
        return view('livewire.account.my-profile.index');
    }
}