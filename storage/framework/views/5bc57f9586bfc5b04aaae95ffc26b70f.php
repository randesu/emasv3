<div class="p-4 bg-white shadow rounded">
    <h2 class="text-lg font-semibold mb-4">Harga Logam Mulia (Antam)</h2>

    <div class="mb-2">
        <strong>Buy:</strong> <?php echo e($buy); ?>

    </div>
    <div>
        <strong>Sell:</strong> <?php echo e($sell); ?>

    </div>

    
    

    
    <script>
        document.addEventListener("livewire:load", () => {
            setInterval(() => {
                Livewire.dispatch('refreshHarga');
            }, 10000); // setiap 10 detik
        });
    </script>
</div>
<?php /**PATH /var/www/emasv3/resources/views/livewire/harga-logam.blade.php ENDPATH**/ ?>