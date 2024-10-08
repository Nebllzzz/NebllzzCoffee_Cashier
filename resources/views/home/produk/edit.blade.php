@extends('layouts.main')
@section('title','Edit Produk')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Form Edit Produk</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <form action="/produk/{{ $produk->id }}/update" method="post" enctype="multipart/form-data" class="m-4 ml-5 mr-5" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input
                        type="file"
                        class="form-control bordered"
                        name="Gambar"
                        id="gambar"
                        aria-describedby="helpId"
                        placeholder=""
                        value="{{ $produk->Gambar}}"
                    />
                </div>    
                <label class="form-label" for="NamaProduk">Nama Produk</label>
                <div class="input-group input-group-outline mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="NamaProduk"
                        id="NamaProduk"
                        required
                        value="{{ $produk->NamaProduk}}"
                        >
                </div>

                <label class="form-label mx-3" for="ProdukID">Nama Produk</label>
                <div class="input-group input-group-outline mb-3">
                    <select name="KategoriID" id="KategoriID" class="form-control">
                      <option value="">Kategori Produk</option>
                    @foreach($kategori as $kategori)
                      <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                    @endforeach
                    </select>
                </div>

                <label class="form-label" for="Harga">Harga</label>
                <div class="input-group input-group-outline mb-3">
                      <input
                        type="number"
                        class="form-control"
                        name="Harga"
                        id="Harga"
                        required
                        value="{{ $produk->Harga}}"
                        >
                </div>
                <label class="form-label" for="Stok">Stok</label>
                <div class="input-group input-group-outline mb-3">
                      <input
                        type="number"
                        class="form-control"
                        name="Stok"
                        id="Stok"
                        required
                        value="{{ $produk->Stok}}"
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