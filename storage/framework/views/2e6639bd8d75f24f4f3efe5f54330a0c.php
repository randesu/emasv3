<div class="modal fade" wire:ignore.self ref="modal" id="modal-<?php echo e($item->id); ?>" tabindex="-1" aria-hidden="true" style="margin-top: 250px">
    <div class="modal-dialog">
        <div class="modal-content rounded border-0 shadow-sm">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Rating</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <div class="d-flex gap-2 rating">
                        <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 5; $i++): ?>
                            <label for="star<?php echo e($i); ?>" class="mb-0 position-relative">
                                
                                <input wire:click="setRating(<?php echo e($i); ?>)" type="radio" id="star<?php echo e($i); ?>" value="<?php echo e($i); ?>" 
                                    class="position-absolute start-0 top-0 w-100 h-100 opacity-0"  style="cursor: pointer"/>

                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" style="cursor: pointer"
                                    class="cursor-pointer <?php if($rating >= $i): ?> text-orange <?php else: ?> text-secondary <?php endif; ?>" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>

                            </label>
                        <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-2 rounded border-0">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                <div class="d-flex justify-content-center mt-3">
                    <textarea class="form-control <?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tulis ulasan disini..." rows="3" wire:model="review"></textarea>
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger mt-2 rounded border-0">
                        <?php echo e($message); ?>

                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded border-0 shadow-sm"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click="storeRating" class="btn btn-primary rounded border-0 shadow-sm" data-bs-dismiss="modal">Send</button>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /var/www/emasv3/resources/views/livewire/account/my-orders/modal-rating.blade.php ENDPATH**/ ?>