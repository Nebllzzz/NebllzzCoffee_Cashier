@extends('layouts.main')
@section('title','User')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Penjualan Table</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <a href="/penjualan/tambah" class="btn btn-info mx-3">Tambah Data</a>
              <a href="/penjualan/laporan" class="btn btn-danger">Cetak Laporan</a>  
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Penjualan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelanggan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Kasir</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Uang Masuk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kembalian</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($penjualan as $penjualan)
                  <tr>
                    <td> <h6 class="mb-0 text-sm m-3">{{$penjualan->TanggalPenjualan}}</h6> </td>
                    <td> <p class="text-xs text-secondary mb-0">{{ $penjualan->pelanggan->NamaPelanggan }}</p> </td>
                    <td> <p class="text-xs text-secondary mb-0">{{ $penjualan->user->name }}</p> </td>
                    <td> <p class="text-xs text-secondary mb-0">Rp.{{number_format($penjualan->TotalHarga)}}</p> </td>
                    <td> <p class="text-xs text-secondary mb-0">Rp.{{number_format($penjualan->UangMasuk)}}</p> </td>
                    <td> <p class="text-xs text-secondary mb-0">Rp.{{number_format($penjualan->Kembalian)}}</p> </td>
                    <td class="align-middle text-center text-sm">
                      @if($penjualan->TotalHarga == 0)
                      <a href="/penjualan/{{ $penjualan->id }}/edit" class="badge badge-sm bg-gradient-secondary">
                        Isi Keranjang
                      </a>
                      @else
                      <a href="/penjualan/{{ $penjualan->id }}/struk" class="badge badge-sm bg-gradient-info">
                        Cetak Struk Pembelian
                      </a>
                      @endif
                      <br>
                      <a href="/penjualan/{{ $penjualan->id }}/hapus" class="badge badge-sm bg-gradient-danger mt-1">
                        Hapus
                      </a>
                      <br>
                  </td>                  
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

@if (session('succes'))

<script>
  Swal.fire({
  title: "Berhasil!",
  text: "{{ session('succes') }}",
  icon: "success"
});
</script>

@endif

@endsection
