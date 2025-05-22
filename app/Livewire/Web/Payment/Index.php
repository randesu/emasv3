<?php

namespace App\Livewire\Web\Payment;

use Livewire\Component;
use App\Models\TransactionV2;

class Index extends Component
{
    public $snapToken;
    
    public function mount($snapToken)
    {
        $this->snapToken = $snapToken;
        
        // Verify transaction exists
        $transaction = TransactionV2::where('snap_token', $snapToken)
            ->where('customer_id', auth()->guard('customer')->user()->id)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.web.payment.index');
    }
}
    