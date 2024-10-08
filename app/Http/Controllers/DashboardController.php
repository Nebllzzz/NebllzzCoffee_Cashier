<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $Tuser = User::count();
        $Tpelanggan = Pelanggan::count();
        $Tkategori = Kategori::count();
        $Tpenjualan = Penjualan::SUM('TotalHarga');
        
        $userId = Auth::user()->id;
        $historiPenjualan = Penjualan::where('UserId', $userId)->orderBy('created_at', 'desc')->take(3)->get();
        
        return view('home.dashboard', compact('Tuser','Tpelanggan','Tkategori','Tpenjualan', 'historiPenjualan'));
    }
}
