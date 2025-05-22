<?php

namespace App\Livewire\Account\MyOrders;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TransactionV2;

class Show extends Component
{
    /**
     * snap_token
     *
     * @var mixed
     */
    public $snap_token;
    
    /**
     * mount
     *
     * @param  mixed $snap_token
     * @return void
     */
    public function mount($snap_token)
    {
        $this->snap_token = $snap_token;
    }

    public function render()
    {
        //get transaction
        $transaction = TransactionV2::query()
            ->with( 'customer', 'transactionDetails.product')
            ->where('id_pembeli', auth()->guard('customer')->user()->id)
            ->where('snap_token', $this->snap_token)
            ->firstOrFail();

        return view('livewire.account.my-orders.show', compact('transaction'));
    }
}