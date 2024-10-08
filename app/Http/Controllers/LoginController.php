<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showlogin()
    {
        if(Auth::check()){
            return redirect('/dashboard')->with('gagal', 'Anda Sudah Login!!');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Coba melakukan login
        if (Auth::attempt($data)) {
            // Ambil user yang sudah login
            $user = Auth::user();

            // Cek apakah status user aktif
            if ($user->status=='aktif') {
                // Jika status aktif, redirect ke dashboard
                return redirect('/dashboard')->with('succes', 'Welcome!! Anda Berhasil Login');
            } else {
                // Jika status tidak aktif, logout user
                Auth::logout();
                
                // Redirect kembali ke halaman login dengan pesan error
                return redirect('/')->with('gagal', 'Akun Anda tidak aktif. Silakan hubungi administrator.');
            }
        } else {
            // Jika login gagal (email atau password salah)
            return redirect('/')->with('gagal', 'Email atau Password yang Anda inputkan Salah!');
        }
    }

    public function actionlogout(){
        Auth::logout();
        return redirect('/')->with('succes', 'Anda Berhasil Logout');
    }
}
