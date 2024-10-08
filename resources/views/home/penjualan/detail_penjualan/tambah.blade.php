@extends('layouts.main')
@section('title','Tambah Keranjang')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-5">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Form Tambah Keranjang</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <form action="/detailpenjualan/simpan" class="mx-3" method="post" autocomplete="off">
                @csrf
                <div class="input-group input-group-outline mb-3 w-75 mx-3">
                  <input 
                  type="hidden"
                  id="id" 
                  name="PenjualanID" 
                  class="form-control"
                  value="{{ $penjualan->id}}"
                  >    
                </div>
                
                <label class="form-label mx-3" for="ProdukID">Nama Produk</label>
                <div class="input-group input-group-outline mb-3 w-75 mx-3">
                    <select name="ProdukID" id="produkID" class="form-control">
                        <option value="">Pilih Produk</option>
                        @foreach($produk as $item)
                            <option value="{{ $item->id }}" data-harga="{{ $item->Harga }}">{{ $item->NamaProduk }}</option>
                        @endforeach
                    </select>  
                </div>      
            
                <label class="form-label mx-3" for="harga">Harga</label>
                <div class="input-group input-group-outline mb-3 w-75 mx-3">
                    <input 
                        type="number"
                        id="harga" 
                        name="Harga" 
                        class="form-control"
                        readonly
                        value=""
                    >  
                </div>      
                <label class="form-label mx-3" for="jumlah_produk">Jumlah Produk</label>
                <div class="input-group input-group-outline mb-3 w-75 mx-3">
                    <input
                    type="number" 
                    id="jumlah_produk" 
                    name="JumlahProduk" 
                    class="form-control"
                    oninput="pengalian()"
                    >  
                </div>
                <label class="form-label mx-3" for="subtotal">Subtotal</label>
                <div class="input-group input-group-outline mb-3 w-75 mx-3">
                    <input 
                        type="number"
                        id="subtotal"
                        name="Subtotal" 
                        class="form-control"
                        readonly
                        value=""
                    >  
                </div>  
                <button type="submit" class="btn btn-info m-2">Tambah</button>
            </form>
            
          </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Table Detail Penjualan</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Produk</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Produk</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subtotal</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($detailpenjualan as $dp)
                    <tr>
                      <td> <h6 class="mb-0 text-sm m-3">{{ $dp->produk->NamaProduk }}</h6> </td>
                      <td> <p class="text-xs text-secondary mb-0">{{ $dp->JumlahProduk }}</p> </td>
                      <td> <p class="text-xs text-secondary mb-0">Rp.{{number_format( $dp->Harga, 2,'.',',')}}</p> </td>
                      <td> <p class="text-xs text-secondary mb-0">Rp.{{number_format( $dp->Subtotal, 2,'.',',')}}</p> </td>
                      <td class="align-middle text-center text-sm">
                        <a href="/detailpenjualan/{{ $dp->id }}/hapus" class="badge badge-sm bg-gradient-danger">
                          Cancle Pesanan
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              
              <form action="/detailpenjualan/{{ $penjualan->id }}/update" method="post" class="mt-4" autocomplete="off">
                @csrf
                    <label for="" class="mx-3"><b>Total Bayar</b></label>
                    <input
                      type="number"
                      id="TotalHarga" 
                      name="TotalHarga" 
                      value="{{$totalbayar}}" 
                      class="border-0 form-control mx-3" 
                      readonly
                    >
                    <div class="input-group input-group-outline mb-3 w-125">
                    <input 
                      type="hidden" 
                      name="TanggalPenjualan"
                      value="{{ $penjualan->TanggalPenjualan }}" 
                      class="form-control mx-3"
                    >
                    </div>
                    <label for="" class="mx-3"><b>Uang Masuk</b></label> 
                    <div class="input-group input-group-outline mb-3 w-125">
                    <input 
                      type="number"
                      id="UangMasuk" 
                      name="UangMasuk"
                      value="0" 
                      class="form-control mx-3"
                      oninput="pengurangan()"

                    >
                    </div>
                    <label for="" class="mx-3"><b>Kembalian</b></label> 
                    <div class="input-group input-group-outline mb-3 w-125">
                    <input 
                      type="number" 
                      id="Kembalian"
                      name="Kembalian"
                      value="" 
                      class="form-control mx-3"
                      readonly
                    >
                    </div>
                    <div class="input-group input-group-outline mb-3 w-125">
                      <input 
                        type="hidden" 
                        name="PelangganID"
                        value="{{ $penjualan->PelangganID }}" 
                        class="form-control mx-3"
                      >
                    <div class="input-group input-group-outline mb-3 w-125">
                      <input 
                        type="hidden" 
                        name="UserID"
                        value="1" 
                        class="form-control mx-3"
                      >
                </div>
                <button type="submit" class="btn btn-info m-3" style="border-radius: 5px;">Bayar</button>
              </form>
            </div>
          </div>
      </div>
    </div>
</div>

<script>
    // Ambil elemen dropdown dan input harga
    const produkDropdown = document.getElementById('produkID');
    const hargaInput = document.getElementById('harga');

    // Tambahkan event listener untuk mendeteksi perubahan di dropdown produk
    produkDropdown.addEventListener('change', function() {
        const selectedOption = produkDropdown.options[produkDropdown.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga');

        if (harga) {
            hargaInput.value = harga;
        } else {
            hargaInput.value = '';
        }
    });
</script>

<script>
    function pengalian() {
        const harga = document.getElementById('harga').value;
        const jumlahProduk = document.getElementById('jumlah_produk').value;

        const subtotal = harga * jumlahProduk;

        document.getElementById('subtotal').value = subtotal;
        
    }
</script>

<script>
    function pengurangan() {
        const totalharga = document.getElementById('TotalHarga').value;
        const uangmasuk = document.getElementById('UangMasuk').value;

        const kembalian = uangmasuk - totalharga;

        if(kembalian <= 0){
          document.getElementById('Kembalian').value = 0;
        }else{
          document.getElementById('Kembalian').value = kembalian;
        }
        
    }
</script>

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
