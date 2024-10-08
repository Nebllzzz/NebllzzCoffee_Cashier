<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // AMBIL DATA PRODUK DAN PENJUALAN
        $ip = $request->ProdukID;
        $produk = Produk::find($ip);
        $PenjualanID = $request->PenjualanID;

        //  PENGECEKAN APAKAH STOK TERSEDIA
        if($produk->Stok < $request->JumlahProduk){
            return redirect('/penjualan/' . $PenjualanID . '/edit')->with('gagal', 'Stok Produk Tidak Tersedia!!!');
        }

        // PENGURANGAN STOK
        $produk->decrement('Stok', $request->JumlahProduk);

        // PEMBUATAN DATA DETAILPENJUALAN
        DetailPenjualan::create([
            'PenjualanID'=>$request->PenjualanID,
            'ProdukID'=>$request->ProdukID,
            'JumlahProduk'=>$request->JumlahProduk,
            'Harga'=>$request->Harga,
            'Subtotal'=>$request->Subtotal
        ]);

        return redirect('/penjualan/' . $PenjualanID . '/edit')->with('succes', 'Pesanan Berhasil Ditambahkan');  

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // MENANGKAP DATA DETAIL PENJUALAN, PENJUALAN DAN PRODUK
        $detailpenjualan=DetailPenjualan::find($id);
        $ip= Produk::find($detailpenjualan->ProdukID);
        $jp = $detailpenjualan->JumlahProduk;
        $PenjualanID = $detailpenjualan->PenjualanID;

        // Mengembalikan Stok Produk Dari Keranjang Pesanan yang telah dibuat
        $ip->increment('Stok', $jp);

        // Menghapus Pesanan
        $detailpenjualan->delete();

        return redirect('/penjualan/' . $PenjualanID . '/edit')->with('succes', 'Pesanan Berhasil Dicancle'); 
    }
}
