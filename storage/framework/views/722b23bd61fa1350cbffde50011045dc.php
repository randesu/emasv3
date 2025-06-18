
<?php $__env->startSection('title'); ?>
<?php echo e($produk->nama_produk); ?> - Toko Emas Online
<?php $__env->stopSection(); ?>

<?php $__env->startSection('image'); ?>
<?php echo e(asset($produk->linkgambar)); ?>

<?php $__env->stopSection(); ?>

<div class="container my-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6">
            <div class="border p-3 rounded">
                <!-- Gambar utama -->
                <img
                    id="mainImage"
                    src="<?php echo e(asset($produk->linkgambar)); ?>"
                    class="img-fluid object-fit-contain border rounded"
                    alt="<?php echo e($produk->nama_produk); ?>"
                    style="width: 100%; max-width: 600px; height: 600px; object-fit: cover; background-color: #f8f9fa;"
                >

                
                
                <!-- Thumbnail -->
                <div class="mt-2 d-flex gap-2">
                    <img src="<?php echo e(asset($produk->linkgambar)); ?>" width="60" class="border rounded thumbnail" alt="thumb1">
                    <img src="<?php echo e(asset($produk->linkgambar2)); ?>" width="60" class="border rounded thumbnail" alt="thumb2">
                    <img src="<?php echo e(asset($produk->linkgambar3)); ?>" width="60" class="border rounded thumbnail" alt="thumb3">
                </div>
            </div>
        </div>

        <script>
            // Ambil semua thumbnail
            document.querySelectorAll('.thumbnail').forEach(function(thumb) {
                thumb.addEventListener('click', function() {
                    // Saat thumbnail diklik, ambil src-nya dan ubah gambar utama
                    const mainImage = document.getElementById('mainImage');
                    mainImage.src = this.src;
                });
            });
        </script>




        

        <!-- Detail Produk -->
        <div class="col-md-6">
            <h4><strong><?php echo e($produk->nama_produk); ?></strong></h4>
            <h5 class="text-orange mt-3 mb-4" style="color: #ff6600;">Rp. <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></h5>

            <table class="table table-borderless mb-4">
                <tr>
                    <td><strong>Nomor SKU</strong></td>
                    <td>: <?php echo e($produk->kode_produk); ?></td>
                </tr>
                <tr>
                    <td><strong>Berat</strong></td>
                    <td>: ± <?php echo e($produk->berat_produk); ?> gram</td>
                </tr>
                <tr>
                    <td><strong>Kadar</strong></td>
                    <td>: <?php echo e($produk->kadar_barang); ?></td>
                </tr>
                <tr>
                    <td><strong>Kategori</strong></td>
                    <td>: <?php echo e($produk->category->name); ?></td>

                </tr>
            </table>

            <!-- Kuantitas dan Tombol -->
            

            <div class="button-detail-product">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.cart.btn-add-to-cart-full', ['idProduk' => $produk->id,'id_produk' => $produk->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3195010520-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.wishlist.btn-add-to-wishlist', ['idProduk' => $produk->id,'id_produk' => $produk->id]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3195010520-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>

            <!-- Spesifikasi Produk -->
            <div class="bg-light rounded p-3 mt-3">
                <h6 class="fw-bold">Spesifikasi Produk</h6>
                <p style="white-space: pre-line;"><?php echo nl2br(e($produk->deskripsi ?? 'Deskripsi belum tersedia.')); ?></p>
            </div>

                <div class="bg-light rounded p-3 mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text me-1" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                </svg>
                Rating & Review
            </h6>
            <div class="row mt-3">

            <div class="row mt-3">

                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $produk->ratings()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 mb-4">
                    <div class="card border-0 shadow-sm rounded h-100">
                        <div class="card-body">
                            <!-- Display Stars -->
                            <div class="d-flex justify-content-center mt-3">
                                <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 5; $i++): ?> <label for="star<?php echo e($i); ?>-<?php echo e($rating->id); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="cursor-pointer <?php if($rating->rating >= $i): ?> text-warning <?php else: ?> text-secondary <?php endif; ?>" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                    </label>
                                    <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                             <!-- Review text -->
                            <blockquote class="bsb-blockquote-icon mb-3 mt-4">
                                <p><?php echo e($rating->review); ?></p>
                            </blockquote>

                            <!-- Customer Info -->
                            <figure class="d-flex align-items-center m-0 p-0">
                                
                                <figcaption class="ms-2 mt-1">
                                    <h6 class="mb-1"><?php echo e($rating->customer->nama_pembeli ?? 'Nama tidak tersedia'); ?></h6>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            </div>

            
        </div>
    </div>
</div>

<script>
    function tambahJumlah() {
        let input = document.getElementById("jumlah");
        if (parseInt(input.value) < <?php echo e($produk->stok); ?>) {
            input.value = parseInt(input.value) + 1;
        }
    }

    function kurangiJumlah() {
        let input = document.getElementById("jumlah");
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    function masukkanKeranjang() {
        alert("Produk ditambahkan ke keranjang!");
        // Tambahkan fungsi Livewire atau AJAX di sini
    }

    function beliSekarang() {
        alert("Menuju halaman pembelian!");
        // Tambahkan logika redirect atau AJAX
    }
</script>
<?php /**PATH /var/www/emasv3/resources/views/livewire/web/products/show.blade.php ENDPATH**/ ?>