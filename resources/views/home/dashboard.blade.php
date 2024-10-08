@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

@if(auth()->user()->role == 'admin')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total User</p>
              <h4 class="mb-0">{{ $Tuser }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3 d-flex justify-content-center">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/user">More Info</a></p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">baby_changing_station</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Pelanggan</p>
              <h4 class="mb-0">{{ $Tpelanggan }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3 d-flex justify-content-center">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/pelanggan">More Info</a></p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">ballot</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Kategori</p>
              <h4 class="mb-0">{{ $Tkategori }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3 d-flex justify-content-center">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"><a href="/kategori">More Info</a></p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">wallet</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Penghasilan</p>
              <h4 class="mb-0">{{ $Tpenjualan }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3 d-flex justify-content-center">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/penjualan">More Info</a></p>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">baby_changing_station</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Pelanggan</p>
                <h4 class="mb-0">{{ $Tpelanggan }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 d-flex justify-content-center">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/pelanggan">More Info</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">wallet</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Penghasilan</p>
                <h4 class="mb-0">{{ $Tpenjualan }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 d-flex justify-content-center">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/penjualan">More Info</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>    
    @endif

    <!-- Tabel Histori Penjualan Terakhir -->
    <div class="row mt-5">
      <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
              <div class="card-header pb-0">
                <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-x1 mt-n5 position-absolute">
                  <i class="material-icons opacity-10">timer</i>
                </div>
                <br>
                  <h6>Histori Penjualan Terakhir</h6>
              </div>
              <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                      @if($historiPenjualan->isEmpty())
                      <!-- Jika Tidak Ada Data Penjualan -->
                      <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Belum ada data penjualan akhir-akhir ini.</p>
                      </div>
                      @else
                      <!-- Tabel Data Penjualan -->
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Pembayaran</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Uang Masuk</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kembalian</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($historiPenjualan as $penjualan)
                              <tr>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">{{ $penjualan->TanggalPenjualan }}</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">{{ $penjualan->pelanggan->NamaPelanggan }}</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Rp {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Rp {{ number_format($penjualan->UangMasuk, 0, ',', '.') }}</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Rp {{ number_format($penjualan->Kembalian, 0, ',', '.') }}</p>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      @endif
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
    @elseif (session('gagal'))
    <script>
          Swal.fire({
            title: "Terjadi Masalah!",
            text: "{{session('gagal')}}",
            icon: "error"
            });
    </script>
    @endif


@endsection
