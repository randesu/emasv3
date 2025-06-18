<button 
    wire:click="storeCheckout"
    class="btn btn-orange-2 rounded border-0 shadow-sm w-100"
    <?php if($totalPrice == 0 || $address == ''): echo 'disabled'; endif; ?>
>
    <!--[if BLOCK]><![endif]--><?php if($loading): ?>
        Processing...
    <?php else: ?>
        Process to Payment
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</button>
<?php /**PATH /var/www/emasv3/resources/views/livewire/web/checkout/btn-checkout.blade.php ENDPATH**/ ?>