<?php

namespace App\Livewire\Account\MyOrders;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionV2;

class Index extends Component
{

    //public $image;
    public $nama_pembeli;
    public $username_pembeli;

    public function mount()
    {
        $this->nama_pembeli = auth()->guard('customer')->user()->nama_pembeli;
        $this->username_pembeli = auth()->guard('customer')->user()->username_pembeli;
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
        //get transactions
        $transactions = TransactionV2::query()
            ->where('customer_id', auth()->guard('customer')->user()->id)
            ->latest()
            ->simplePaginate(3);

        return view('livewire.account.my-orders.index', compact('transactions'));
    }
}