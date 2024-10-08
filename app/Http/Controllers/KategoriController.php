<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // AMBIL QUERY ALL DARI KATEGORI
        $kategori = Kategori::orderBy('created_at', 'DESC')->get();
        // MENAMPILKAN HALMAN INDEX KATEGORI
        return view('home.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kategori::create([
            'kategori' => $request->kategori
        ]);

        return redirect('/kategori')->with('succes', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('home.kategori.edit',[
            'kategori' => Kategori::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Kategori::where('id', $id)->update([
            "kategori" => $request->kategori,
        ]);
        return redirect('/kategori')->with('succes', 'Data Berhasil Diedit');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori=Kategori::find($id);
        $kategori->delete();

        return Redirect('/kategori')->with('succes', 'Data Berhasil Dihapus');
    }
}
