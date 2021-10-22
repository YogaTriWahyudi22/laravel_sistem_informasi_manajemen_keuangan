<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('halaman_utama.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $proses = $request->only('username', 'password');
        if (Auth::attempt($proses)) {
            $user = Auth::User();

            if ($user->status == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->status == 'bendahara') {
                return redirect()->intended('bendahara');
            } elseif ($user->status == 'kepsek') {
                return redirect()->intended('kepsek');
            } elseif ($user->status == 'ketua_yayasan') {
                return redirect()->intended('ketua_yayasan');
            }

            return redirect('/');
        }
        return redirect()->route('logout');
    }

    public function admin()
    {
        if (Auth::user()->status == 'admin') {

            return view('halaman_admin.dashboard.dashboard');
        } else {
            return redirect()->route('/');
        }
    }

    public function bendahara()
    {
        if (Auth::user()->status == 'bendahara') {

            return view('halaman_admin.dashboard.dashboard');
        } else {
            return redirect()->route('/');
        }
    }

    public function kepsek()
    {
        if (Auth::user()->status == 'kepsek') {

            return view('halaman_admin.dashboard.dashboard');
        } else {
            return redirect()->route('/');
        }
    }

    public function ketua_yayasan()
    {
        if (Auth::user()->status == 'ketua_yayasan') {

            return view('halaman_admin.dashboard.dashboard');
        } else {
            return redirect()->route('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
