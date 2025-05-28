<div class="container">
    <div class="row justify-content-center mt-0" style="margin-bottom: 150px;">
        <div class="col-md-6">

            <x-menus.customer />

            <div class="card border-0 shadow-sm rounded">
                <div class="card-body p-4">
                    <h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-bag mb-1" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                        My Orders
                    </h6>
                    <hr />

                    @forelse ($transactions as $transaction)
                    <div class="card rounded border mb-3">
                        <div class="row g-0">
                            <div class="col-12 col-md-12">
                                <a href="{{ route('account.my-orders.show', $transaction->snap_token) }}" wire:navigate class="text-decoration-none text-dark">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3 mb-1 me-2" viewBox="0 0 16 16">
                                                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6z" />
                                                </svg>
                                                <span class="fw-bold">Order ID #{{ $transaction->invoice }}</span>
                                            </div>
                                            <div>
                                                @if($transaction->status == 'pending')
                                                <button class="btn btn-warning btn-sm rounded shadow-sm border-0">PENDING</button>
                                                @elseif($transaction->status == 'success')
                                                <button class="btn btn-success btn-sm rounded shadow-sm border-0">SUCCESS</button>
                                                @elseif($transaction->status == 'expired')
                                                <button class="btn btn-warning btn-sm rounded shadow-sm border-0" disabled>EXPIRED</button>
                                                @elseif($transaction->status == 'failed')
                                                <button class="btn btn-danger btn-sm rounded shadow-sm border-0">FAILED</button>
                                                @endif

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <span class="fw-bold">Grand Total:</span>
                                            </div>
                                            <div>
                                                <span class="fw-bold">Rp. {{ number_format($transaction->total) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="card rounded border mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="mt-2">
                                    <span class="fw-bold">You don't have any orders.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse

                    <!-- Navigasi Pagination -->
                    {{ $transactions->links('vendor.pagination.simple-default') }}


                </div>
            </div>

        </div>
    </div>
</div>


<!-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .product-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .product-info {
            flex: 1;
        }

        .product-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 4px;
        }

        .product-variant {
            font-size: 14px;
            color: #666;
            margin-bottom: 2px;
        }

        .product-quantity {
            font-size: 14px;
            color: #666;
        }

        .pricing-section {
            text-align: right;
            margin-right: 20px;
        }

        .price-row {
            margin-bottom: 8px;
        }

        .original-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            margin-right: 8px;
        }

        .current-price {
            font-size: 16px;
            color: #ff6b35;
            font-weight: 600;
        }

        .total-label {
            font-size: 14px;
            color: #333;
            margin-right: 8px;
        }

        .total-price {
            font-size: 18px;
            color: #ff6b35;
            font-weight: 700;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-direction: column;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            min-width: 120px;
        }

        .btn-primary {
            background-color: #ff6b35;
            color: white;
        }

        .btn-primary:hover {
            background-color: #e55a2b;
        }

        .btn-secondary {
            background-color: #f0f0f0;
            color: #333;
            border: 1px solid #ddd;
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
        }

        @media (max-width: 640px) {
            .product-card {
                flex-direction: column;
                text-align: center;
            }

            .pricing-section {
                text-align: center;
                margin-right: 0;
                margin: 16px 0;
            }

            .action-buttons {
                flex-direction: row;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Product Card 1 -->
        <div class="product-card">
            <img src="/placeholder.svg?height=80&width=80" alt="Cincin Aurum lab Emas 9 karat" class="product-image">
            
            <div class="product-info">
                <h3 class="product-title">Cincin Aurum lab Emas 9 karat</h3>
                <p class="product-variant">Variasi : Cincin</p>
                <p class="product-quantity">x1</p>
            </div>

            <div class="pricing-section">
                <div class="price-row">
                    <span class="original-price">Rp. 999.000</span>
                    <span class="current-price">Rp. 819.000</span>
                </div>
                <div>
                    <span class="total-label">Total Pesanan:</span>
                    <span class="total-price">Rp. 819.000</span>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary">Beli Lagi</button>
                <button class="btn btn-secondary">Hubungi Penjual</button>
            </div>
        </div>

        <!-- Product Card 2 -->
        <div class="product-card">
            <img src="/placeholder.svg?height=80&width=80" alt="Cincin Aurum lab Emas 9 karat" class="product-image">
            
            <div class="product-info">
                <h3 class="product-title">Cincin Aurum lab Emas 9 karat</h3>
                <p class="product-variant">Variasi : Cincin</p>
                <p class="product-quantity">x1</p>
            </div>

            <div class="pricing-section">
                <div class="price-row">
                    <span class="original-price">Rp. 999.000</span>
                    <span class="current-price">Rp. 819.000</span>
                </div>
                <div>
                    <span class="total-label">Total Pesanan:</span>
                    <span class="total-price">Rp. 819.000</span>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary">Beli Lagi</button>
                <button class="btn btn-secondary">Hubungi Penjual</button>
            </div>
        </div>

        <!-- Product Card 3 -->
        <div class="product-card">
            <img src="/placeholder.svg?height=80&width=80" alt="Cincin Aurum lab Emas 9 karat" class="product-image">
            
            <div class="product-info">
                <h3 class="product-title">Cincin Aurum lab Emas 9 karat</h3>
                <p class="product-variant">Variasi : Cincin</p>
                <p class="product-quantity">x1</p>
            </div>

            <div class="pricing-section">
                <div class="price-row">
                    <span class="original-price">Rp. 999.000</span>
                    <span class="current-price">Rp. 819.000</span>
                </div>
                <div>
                    <span class="total-label">Total Pesanan:</span>
                    <span class="total-price">Rp. 819.000</span>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary">Beli Lagi</button>
                <button class="btn btn-secondary">Hubungi Penjual</button>
            </div>
        </div>
    </div>

    <script>
        // Add click handlers for buttons
        document.querySelectorAll('.btn-primary').forEach(button => {
            button.addEventListener('click', function() {
                alert('Fitur "Beli Lagi" akan segera tersedia!');
            });
        });

        document.querySelectorAll('.btn-secondary').forEach(button => {
            button.addEventListener('click', function() {
                alert('Menghubungi penjual...');
            });
        });
    </script>
</body>
</html> -->