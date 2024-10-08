<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .struk-container {
            width: 300px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 10px;
        }

        .header {
            text-align: center;
        }

        .header h1 {
            font-size: 18px;
            margin-bottom: 0;
        }

        .header p {
            margin: 5px 0;
        }

        .content {
            margin-top: 10px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
        }

        .content table th, .content table td {
            text-align: left;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }

        .total {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
        }

        .footer p {
            margin: 0;
        }

        @media print {
            body {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="struk-container">
        <div class="header">
            <h1>NebllzCoffee</h1>
            <p>Jl. Kopi No. 123, Jakarta</p>
            <p>Tel: 081234567890</p>
        </div>
        <p>============================================</p>
        <div class="content">
            <p><strong>Tanggal:</strong> {{ $penjualan->TanggalPenjualan }}</p>
            <p><strong>Kode Transaksi:</strong> #{{ $penjualan->id }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ $penjualan->pelanggan->NamaPelanggan }}</p>
            <p><strong>Nama Kasir:</strong> {{ $penjualan->user->name }}</p>
        <p>---------------------------------------------------------------------------</p>
        <table>
            <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailpenjualan as $item)
                    <tr>
                        <td>{{ $item->produk->NamaProduk }}</td>
                        <td>{{ $item->JumlahProduk }}</td>
                        
                        <td>Rp {{ number_format($item->Harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->Subtotal, 0, ',', '.') }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <p>---------------------------------------------------------------------------</p>
            
            <p class="total"><strong>Total Bayar: Rp {{ number_format($totalbayar, 0, ',', '.') }}</strong></p>
            <p><strong>Uang Masuk:</strong> Rp {{ number_format($uangmasuk, 0, ',', '.') }}</p>
            <p><strong>Kembalian:</strong> Rp {{ number_format($kembalian, 0, ',', '.') }}</p>
        </div>

        <div class="footer">
            <p>Terima Kasih Telah Berbelanja!</p>
            <p>Selamat Menikmati</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
