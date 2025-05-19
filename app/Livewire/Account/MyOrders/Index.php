<?php

namespace App\Livewire\Account\MyOrders;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionV2;

class Index extends Component
{
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