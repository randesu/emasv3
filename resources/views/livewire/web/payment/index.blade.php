<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center mb-4">
                    <h4>Payment Process</h4>
                    <p class="text-muted">Please complete your payment</p>
                </div>

                <div class="text-center" wire:ignore>
                    <button id="pay-button" class="btn btn-orange-2 rounded border-0 shadow-sm">
                        Pay Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', async function(e) {
        e.preventDefault();
        
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                window.location.href = '/account/my-orders/' + '{{ $snapToken }}';
            },
            onPending: function(result) {
                window.location.href = '/account/my-orders/' + '{{ $snapToken }}';
            },
            onError: function(result) {
                window.location.href = '/account/my-orders/' + '{{ $snapToken }}';
            },
            onClose: function() {
                window.location.href = '/account/my-orders/' + '{{ $snapToken }}';
            }
        });
    });
</script>
@endpush
