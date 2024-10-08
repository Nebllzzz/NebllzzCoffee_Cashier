@extends('layouts.main')
@section('title','Tambah User')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Form Tambah Penjualan</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2" >
             <form action="/penjualan/simpan" class="m-4 ml-5 mr-5" method="post" autocomplete="off">
                @csrf
                <label class="form-label" for="PelangganID">Nama Pelanggan Terbaru</label>
                <div class="input-group input-group-outline mb-3">
                  <input
                  type="hidden"
                  name="PelangganID"
                  class="form-control"
                  id="PelangganID"
                  readonly
                  value="{{ $PB->id }} "
                  >
                  <input
                  type="text"
                  name="PelangganID"
                  class="form-control"
                  id="PelangganID"
                  disabled
                  value="{{ $PB->NamaPelanggan }} "
                  >  
                </div>      
                <button type="submit" class="btn btn-info">Tambah</button>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
