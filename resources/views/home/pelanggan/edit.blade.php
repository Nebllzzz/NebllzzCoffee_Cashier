@extends('layouts.main')
@section('title','Tambah Pelanggan')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Form Edit Pelanggan</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
             <form action="/pelanggan/{{ $pelanggan->id }}/update" class="m-4 ml-5 mr-5" method="post" autocomplete="off">
                @csrf
                <label class="form-label" for="name">Nama Pelanggan</label>
                <div class="input-group input-group-outline mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="NamaPelanggan"
                        id="name"
                        required
                        value="{{ $pelanggan->NamaPelanggan}}"
                        >
                </div>

                <label class="form-label" for="Alamat">Alamat</label>
                <div class="input-group input-group-outline mb-3">
                      <input
                        type="text"
                        class="form-control"
                        name="Alamat"
                        id="Alamat"
                        required
                        value="{{ $pelanggan->Alamat}}"
                        >
                </div>

                <label class="form-label" for="NoTlp">Nomer Telepon</label>
                <div class="input-group input-group-outline mb-3">
                      <input
                        type="number"
                        class="form-control"
                        name="NoTlp"
                        id="NoTlp"
                        required
                        value="{{ $pelanggan->NoTlp}}"
                        >
                </div>

                <button type="submit" class="btn btn-info">Edit</button>
             </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
