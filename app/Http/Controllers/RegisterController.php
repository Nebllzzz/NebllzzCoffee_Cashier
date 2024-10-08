<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showregister()
    {
        if(Auth::check()){
            return redirect('/dashboard')->with('gagal', 'Anda Sudah Login');
        }else{
            return view('register');
        }
    }

    public function actionregister(Request $request)
    {
        // pengecekan apakah email yang diinputkan sudah terdaftar atau belum
        $cekemail = User::where('email', $request->email)->exists();
        if($cekemail == $request->email){
            return redirect('/register')->with('gagal', 'Akun dengan email yang anda inputkan sudah terdaftar!!');
        }

        // pengecekan password dan confirm password harus sama
        if($request->password != $request->Cpassword){
            return redirect('/register')->with('gagal', 'Input Password Tidak Sama!!');
        } else {
        // menambahkan data pengguna baru dari register ke tabel user 
           User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'pengguna',
                'status' => 'tidak aktif'
           ]); 

           return redirect('/')->with('succes', 'Akun Anda Sudah Didaftarkan, Silahkan Tunggu Persetujuan Administator!!');
        }
    }
}
