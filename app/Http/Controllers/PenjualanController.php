<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Ambil ID user yang sedang login
    $userId = Auth::user()->id;

    // Filter penjualan berdasarkan user yang menambahkannya
    $penjualan = Penjualan::where('UserID', $userId)->orderBy('created_at', 'DESC')->get();

    return view('home.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //MENGAMBIL DATA PELANGGAN YANG BARU DIBUAT DAN DATA USER 
        $PB = Pelanggan::orderBy('created_at', 'DESC')->first();
        $user = User::all();
        return view('home.penjualan.tambah', compact('user','PB'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        Penjualan::create([
            'TanggalPenjualan' => now(),
            'TotalHarga' => 0,
            'UangMasuk' => 0,
            'Kembalian' => 0,
            'PelangganID' => $request->PelangganID,
            'UserID' => Auth::user()->id,
        ]);

        return redirect('/penjualan')->with('succes', 'Pelanggan sudah ditentukan, silahkan tentukan pesanan!!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::all();
        $pelanggans = Pelanggan::all();
        $penjualan = Penjualan::find($id);
        $totalbayar = DetailPenjualan::where('penjualanid', $id)->sum('subtotal');
        $detailpenjualan = DetailPenjualan::where('PenjualanID', $id)->orderBy('created_at', 'desc')->get();
        return view('home.penjualan.detail_penjualan.tambah', compact('produk','penjualan', 'pelanggans', 'detailpenjualan', 'totalbayar'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {

        Penjualan::where('id', $id)->update([
            "TanggalPenjualan" => $request->TanggalPenjualan,
            "TotalHarga" => $request->TotalHarga,
            "UangMasuk" => $request->UangMasuk,
            "Kembalian" => $request->Kembalian,
            "PelangganId" => $request->PelangganID,
            "UserID" => 1
        ]);
        return redirect('/penjualan')->with('succes', 'Data Berhasil Diedit');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan=Penjualan::find($id);
        $penjualan->delete();

        return redirect('/penjualan')->with('succes', 'Data Berhasil Dihapus');
    }

    public function laporan(Request $request)
    {
        $penjualan = Penjualan::orderBy('created_at', 'DESC')->get();
        return view('home.penjualan.laporan', compact('penjualan'));
    }

    public function struk(string $id)
    {
        $penjualan = Penjualan::find($id);
        $detailpenjualan = DetailPenjualan::where('PenjualanID', $id)->get();
        $totalbayar = $penjualan->TotalHarga;
        $uangmasuk = $penjualan->UangMasuk;
        $kembalian = $penjualan->Kembalian;

        
        return view('home.penjualan.struk', compact('totalbayar','uangmasuk','kembalian','penjualan', 'detailpenjualan'));
    }
}
