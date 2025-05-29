<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class HargaLogam extends Component
{
    public $buy = 'Memuat...';
    public $sell = 'Memuat...';

    protected $listeners = ['refreshHarga' => 'fetchHarga'];

    public function mount()
    {
        $this->fetchHarga(); // Ambil data saat pertama kali render
    }

   public function fetchHarga()
{
    try {
        $response = Http::get('https://logam-mulia-api.vercel.app/prices/anekalogam');

        if ($response->successful()) {
            $json = $response->json();
            $firstData = $json['data'][0] ?? null;

            if ($firstData) {
                $this->buy = 'Rp ' . number_format($firstData['buy'], 0, ',', '.');
                $this->sell = 'Rp ' . number_format($firstData['sell'], 0, ',', '.');
            } else {
                $this->buy = 'Data kosong';
                $this->sell = 'Data kosong';
            }
        } else {
            $this->buy = 'Gagal mengambil data';
            $this->sell = 'Gagal mengambil data';
        }
    } catch (\Exception $e) {
        $this->buy = 'Error: ' . $e->getMessage();
        $this->sell = 'Error: ' . $e->getMessage();
    }
}

    public function render()
    {
        return view('livewire.harga-logam');
    }
}
