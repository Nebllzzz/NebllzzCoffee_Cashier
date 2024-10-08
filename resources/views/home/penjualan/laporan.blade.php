@extends('layouts.main2')
@section('title', 'Laporan Penjualan')
@section('content')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-danger shadow-primary border-radius-lg pt-4 pb-3">
                        <center><b><h2 class="text-white text-capitalize ps-3">NebllzCoffee</h2></b></center>
                        <center><h3 class="text-white text-capitalize ps-3">Laporan Penjualan Harian</h3></center>
                        <center><h5 class="text-white text-capitalize ps-3">Tanggal {{ now()->format('d-m-Y');}}</h5></center>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Penjualan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelanggan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Kasir</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Uang Masuk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $penjualan)
                                <tr>
                                    <td> <h6 class="mb-0 text-sm m-3">{{$penjualan->TanggalPenjualan}}</h6> </td>
                                    <td> <p class="text-xs text-secondary mb-0">{{ $penjualan->pelanggan->NamaPelanggan }}</p> </td>
                                    <td> <p class="text-xs text-secondary mb-0">{{ $penjualan->user->name }}</p> </td>
                                    <td> <p class="text-xs text-secondary mb-0">{{$penjualan->TotalHarga}}</p> </td>
                                    <td> <p class="text-xs text-secondary mb-0">{{$penjualan->UangMasuk}}</p> </td>
                                    <td> <p class="text-xs text-secondary mb-0">{{$penjualan->Kembalian}}</p> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        window.print();
    };
</script>
@endsection
