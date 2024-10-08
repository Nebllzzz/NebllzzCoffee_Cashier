<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $pelanggan = Pelanggan::orderBy('created_at', 'DESC')->get();
        return view('home.pelanggan.index', compact('pelanggan'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.pelanggan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pelanggan::create([
            "NamaPelanggan" => $request->NamaPelanggan,
            "Alamat" => $request->Alamat,
            "password" => $request->password,
            "NoTlp" => $request->NoTlp,
        ]);
        return redirect('/penjualan')->with('succes', 'Pelanggan Berhasil Didaftarkan');;
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
        return view('home.pelanggan.edit',[
            'pelanggan' => Pelanggan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Pelanggan::where('id', $id)->update([
            "NamaPelanggan" => $request->NamaPelanggan,
            "Alamat" => $request->Alamat,
            "NoTlp" => $request->NoTlp
        ]);
        return redirect('/penjualan')->with('succes', 'Data Berhasil Diedit');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan=Pelanggan::find($id);
        $pelanggan->delete();

        return redirect('/pelanggan')->with('succes', 'Data Berhasil Dihapus');
    }
}
