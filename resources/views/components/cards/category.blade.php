<div class="">
    <a href="/category/{{ $category->slug }}" wire:navigate class="text-decoration-none">
        {{-- <div class="card border-0 rounded shadow-sm">
            <div class="card-body text-center"> --}}
                {{-- <img src="{{ asset( $category->imagelink) }}" class="img-fluid" width="50"> --}}
                <p class="text-center" style="margin-block-end: 0; margin-inline-end: 0; ">{{ $category->name }}</p>
            {{-- </div>
        </div> --}}
    </a>
</div>