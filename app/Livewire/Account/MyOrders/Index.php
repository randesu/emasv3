<?php

namespace App\Livewire\Account\MyOrders;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionV2;

use Livewire\WithPagination;


class Index extends Component
{

    //public $image;
    public $nama_pembeli;
    public $username_pembeli;
    public $image;
    use WithPagination;

     

    public $filter = 'semua';

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage(); // reset pagination saat filter berubah
    }

    public function mount()
    {
        $user = auth()->guard('customer')->user();
        $this->nama_pembeli = auth()->guard('customer')->user()->nama_pembeli;
        $this->username_pembeli = auth()->guard('customer')->user()->username_pembeli;
        $this->image = $user->image;
    }

     public function rules()
    {
        return [
            'nama_pembeli' => 'required',
            'username_pembeli' => [
                'required',
                Rule::unique('customers', 'username_pembeli')->where(function ($query) {
                    return $query->where('id', auth()->guard('customer')->user()->id);
                }),
            ],
        ];
    }
    
    public function render()
    {

         $query = TransactionV2::where('customer_id', auth()->guard('customer')->id());

        if ($this->filter === 'pembayaran') {
            $query->where('status', 'pending');}
         elseif (in_array($this->filter, ['kemas', 'dikirim'])) {
            // supaya tidak tampil data apapun untuk filter lain
            $query->where('status', '__invalid__');
        }
        elseif ($this->filter === 'selesai') {
            // supaya tidak tampil data apapun untuk filter lain
           $query->where('status', 'success');
        }

        $transactions = $query->latest()->paginate(3);

        return view('livewire.account.my-orders.index', compact('transactions'));
        //get transactions
        // $transactions = TransactionV2::query()
        //     ->where('customer_id', auth()->guard('customer')->user()->id)
        //     ->latest()
        //     ->simplePaginate(3);

        // return view('livewire.account.my-orders.index', compact('transactions'));
    }
}