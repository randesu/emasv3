<div class="p-4 bg-white shadow rounded">
    <h2 class="text-lg font-semibold mb-4">Harga Logam Mulia (Antam)</h2>

    <div class="mb-2">
        <strong>Buy:</strong> {{ $buy }}
    </div>
    <div>
        <strong>Sell:</strong> {{ $sell }}
    </div>

    {{-- Tombol refresh manual jika dibutuhkan --}}
    {{-- <button wire:click="fetchHarga" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
        Refresh
    </button> --}}

    {{-- Auto refresh dengan JavaScript --}}
    <script>
        document.addEventListener("livewire:load", () => {
            setInterval(() => {
                Livewire.dispatch('refreshHarga');
            }, 10000); // setiap 10 detik
        });
    </script>
</div>
