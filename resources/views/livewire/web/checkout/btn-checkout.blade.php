<button 
    wire:click="storeCheckout"
    class="btn btn-orange-2 rounded border-0 shadow-sm w-100"
    @disabled($totalPrice == 0 || $address == '')
>
    @if ($loading)
        Processing...
    @else
        Process to Payment
    @endif
</button>
