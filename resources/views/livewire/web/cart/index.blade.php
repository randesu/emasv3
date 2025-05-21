@section('title')
Carts - Eat Your Favorite Foods
@stop

@section('keywords')
Food Store, Eat Your Favorite Foods
@stop

@section('description')
Food Store - Eat Your Favorite Foods
@stop

@section('image')
{{ asset('images/logo.png') }}
@stop

<div>

    <div class="container">
        <div class="row justify-content-center mt-0" style="margin-bottom: 270px;">
            <div class="col-md-6">
                <div class="bg-white rounded-bottom-custom shadow-sm p-3 sticky-top mb-5">
                    <div class="d-flex justify-content-start">
                        <div>
                            <x-buttons.back />
                        </div>
                    </div>
                </div>

                <div class="row">

                    @forelse ($keranjangs as $keranjang)
                        <div class="col-12 col-md-12 mb-4">
                            <div class="card rounded border-0 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-5 col-md-4">
                                        <img src="{{ $keranjang->produk->linkgambar }}" class="img-fluid w-100 h-100 object-fit-cover rounded-start">
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mt-4">
                                                <div class="text-start">
                                                    <h6 class="card-title">{{ $keranjang->produk->nama_produk }}</h6>
                                                </div>
                                                <div class="text-end">
                                                    
                                                    <!-- btn delete -->

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-4">
                                                <div class="text-start">
                                                    <span class="text-success fw-bold">Rp. {{ number_format($keranjang->produk->harga) }}</span>
                                                </div>
                                                <div class="text-end">
                                                    <div class="input-group justify-content-center align-items-center group-btn-qty">
                                                        
                                                        <!-- decrement qty -->
                                                        <livewire:web.cart.btn-decrement : id="$keranjang->id" :id_produk="$keranjang->id_produk" :disabled="$keranjang->jumlah_beli" />

                                                        <!-- qty cart -->
                                                        <input type="number" step="1" max="10" value="{{ $keranjang->jumlah_beli }}" name="quantity" class="quantity-field border-0 text-center w-25" style="background: transparent;">
                                                        
                                                        <!-- increment qty -->
                                                        <livewire:web.cart.btn-increment : id="$keranjang->id" :id_produk="$keranjang->id_produk" />

                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 col-md-12 mb-4">
                            <div class="card rounded border mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <div class="mt-2">
                                            <span class="fw-bold">You don't have any items in the cart.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>

    @if(count($keranjangs) > 0)
        <div class="container fixed-total">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card rounded shadow-sm border-0 mb-5 ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-0">Total</h6>
                                </div>
                                <div class="ms-auto">
                                    <h6 class="fw-bold mb-0">Rp. {{ number_format($totalPrice) }}</h6>
                                </div>
                            </div>
                            <hr style="border: dotted 1px #e92715;">
                            <a href="/checkout" wire:navigate class="btn btn-orange-2 rounded border-0 shadow-sm w-100">Process to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>