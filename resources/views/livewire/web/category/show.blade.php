@section('title')
Category:  {{ $category->name }} - Eat Your Favorite Foods
@stop

@section('keywords')
Food Store, Eat Your Favorite Foods
@stop

@section('description')
Food Store - Eat Your Favorite Foods
@stop

@section('image')
{{ asset('assets/TokeEmasMitraBaru.png') }}
@stop

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div>
                <span class="fs-6 fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag mb-1" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                    </svg>
                    PRODUCTS IN <span class="text-orange">{{ strtoupper($category->name) }}</span>
                </span>
            </div>

            <hr />

            <div class="row">
                @foreach ($category->produks()->latest()->get() as $produk)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <x-cards.produk :produk="$produk" />
                    </div>
                @endforeach
            </div>

            {{-- Jika ingin pakai pagination di masa depan --}}
            {{-- {{ $category->produks()->paginate(12)->links('vendor.pagination.simple-default') }} --}}
            
        </div>
    </div>
</div>
