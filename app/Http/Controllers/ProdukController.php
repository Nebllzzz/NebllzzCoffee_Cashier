<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('home.produk.index', compact('produk'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('home.produk.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "Gambar" => 'required|image',           
            "NamaProduk" => 'required|min:3',           
            "KategoriID" => 'required',           
            "Harga" => 'required|numeric',           
            "Stok" => 'required|numeric'
        ]);

        $image = $request->file('Gambar');
        $image->storeAs('products', $image->hashName(), 'public');

        Produk::create([
            "Gambar" => $image->hashName(),           
            "NamaProduk" => $request->NamaProduk,           
            "KategoriID" => $request->KategoriID,           
            "Harga" => $request->Harga,           
            "Stok" => $request->Stok           
        ]);
        return redirect('/produk')->with('succes', 'Data Berhasil Ditambahkan');;
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
        return view('home.produk.edit',[
            'produk' => Produk::find($id),
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "Gambar" => 'required|image|mimes:jpeg,jpg,png|max:2048',           
            "NamaProduk" => 'required|min:3',           
            "KategoriID" => 'required',           
            "Harga" => 'required|numeric',           
            "Stok" => 'required|numeric'
        ]);

        $produk = Produk::find($id);

        if ($request->hasFile('Gambar')){

            $image = $request->file('Gambar');
            $image->storeAs('public/products', $image->hashName());

            Storage::delete('public/products/' . $produk->Gambar);

        }

        $produk->update([
            "Gambar" => $image->hashName(),           
            "NamaProduk" => $request->NamaProduk,           
            "KategoriID" => $request->KategoriID,           
            "Harga" => $request->Harga,           
            "Stok" => $request->Stok
        ]);
        return redirect('/produk')->with('succes', 'Data Berhasil Diedit');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk=Produk::find($id);
        $produk->delete();

        return redirect('/produk')->with('succes', 'Data Berhasil Dihapus');
    }
}
