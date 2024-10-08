@extends('layouts.main')
@section('title','Tambah Produk')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Form Tambah Produk</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <form action="/produk/simpan" method="post" enctype="multipart/form-data" class="m-4 ml-5 mr-5" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input
                        type="file"
                        class="form-control"
                        name="Gambar"
                        id="gambar"
                        aria-describedby="helpId"
                        placeholder=""
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
                        >
                </div>

                <label class="form-label" for="ProdukID">Kategori</label>
                <div class="input-group input-group-outline mb-3">
                      <select name="KategoriID" id="KategoriID" class="form-control">
                          <option value="">Kategori Produk</option>
                        @foreach($kategori as $kategori)
                          <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                        @endforeach
                        </select>
                </div> 

                <label class="form-label" for="Harga">Harga</label>
                <div class="input-group input-group-outline mb-3 ">
                      <input
                        type="number"
                        class="form-control"
                        name="Harga"
                        id="Harga"
                        required
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