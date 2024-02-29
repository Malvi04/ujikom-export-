<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login'
        ]);
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validate)) {
            return redirect('dashboard')->with('message', 'Login Berhasil!');
        } else {
            return redirect('/')->with('message', 'Login Gagal!');
        }
    }

    public function dashboard()
    {
        $guru = DB::table('users')->where('jabatan', 'guru')->count();
        $admin = DB::table('users')->where('jabatan', 'admin')->count();
        $walas = DB::table('users')->where('jabatan', 'walas')->count();
        $kesiswaan = DB::table('users')->where('jabatan', 'kesiswaan')->count();
        $bk = DB::table('users')->where('jabatan', 'bk')->count();
        $siswa = DB::table('siswas')->count();
        return view('dashboard.dashboard', [
            'guru' => $guru,
            'admin' => $admin,
            'walas' => $walas,
            'kesiswaan' => $kesiswaan,
            'bk' => $bk,
            'siswa' => $siswa,
            'title' => 'Dashboard'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
