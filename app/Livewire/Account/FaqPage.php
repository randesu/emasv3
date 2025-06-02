<?php

namespace App\Livewire\Account;

use Livewire\Component;
use App\Models\FAQ;
use Illuminate\Support\Facades\Auth;

class FaqPage extends Component
{
    public $faqs;
    public $username_pembeli;
    public $image;

    public function mount()
    {
        $this->faqs = FAQ::select('pertanyaan', 'jawaban')->get();

        // Ambil data user yang sedang login
        $user = Auth::user();

        if ($user) {
            $this->username_pembeli = $user->nama_pembeli; // atau 'username' jika kamu pakai field itu
            $this->image = $user->image ?? null;   // sesuaikan dengan field foto profilmu
        }
    }

    public function render()
    {
        return view('livewire.account.faq');
    }
}
