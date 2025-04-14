<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #007bff;
            --background-color: #f4f7fa;
            --card-background: #ffffff;
            --text-color: #333;
            --title-color: #272727;
            --secondary-text-color: #777;
            --footer-text-color: #aaa;
            --border-color: #ddd;
            --header-footer-background: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-color);
        }

        header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }

        h1 {
            font-size: 2.5rem;
            color: var(--title-color);
            margin: 0;
        }

        h2 {
            font-size: 1.5rem;
            color: var(--secondary-text-color);
            margin-top: 8px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            gap: 30px;
        }

        .card {
            width: 100%;
            max-width: 600px;
            background-color: var(--card-background);
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            border-top: 1px solid var(--border-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 10px 0;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .card p {
            font-size: 1rem;
            color: var(--secondary-text-color);
            margin: 12px 0;
            line-height: 1.5;
        }

        .card p strong {
            color: var(--text-color);
        }

        /* New Styles for Daftar Produk */
        .product-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 10px;
        }

        .product {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product span {
            color: var(--secondary-text-color);
            font-size: 0.95rem;
            word-wrap: break-word;
        }

        .product strong {
            color: var(--text-color);
        }

        .card-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.85rem;
            color: var(--footer-text-color);
            padding: 10px 0;
        }

        footer {
            padding: 20px;
            text-align: center;
            border-top: 1px solid var(--border-color);
            font-size: 0.875rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }

            .card {
                width: 100%;
                max-width: 90%;
            }

            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Laporan Transaksi</h1>
        <h2>Periode: {{ $data['period'] }}</h2>
    </header>
    
    <main class="container">
        @foreach($data['data'] as $item)
        <div class="card">
            <p><strong>Tanggal      :</strong> {{ $item->tanggal }}</p>
            <p><strong>Pelanggan    :</strong> {{ $item->pelanggan?->nama ?? 'Guest' }}</p>

            <!-- Daftar Produk Section -->
            <p><strong>Daftar Produk:</strong></p>
            <div class="product-list">
                @foreach(explode(',', $item->daftar_produk) as $product)
                    <div class="product">
                        <span>{{ $product }}</span>
                    </div>
                @endforeach
            </div>

            <p><strong>Total Harga  :</strong> RP.{{ number_format($item->harga, 0, ',', '.') }}</p>
            <p><strong>Admin        :</strong> {{ $item->user?->name ?? 'Admin' }}</p>

        </div>
        @endforeach
    </main>
    
    <footer>
        <div class="card-footer">
            <p><small>Dibuat pada: {{ now()->format('d M Y') }}</small></p>
        </div>
        <p>&copy; {{ now()->format('Y') }} Your Company Name. All rights reserved.</p>
    </footer>
</body>
</html>
