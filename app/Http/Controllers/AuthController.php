<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }

    function sesi(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin')->with('success', 'Halo Admin 👋, Anda Berhasil Login');
            }else if (Auth::user()->role === 'pegawai') {
                return redirect()->route('pegawai')->with('success', 'Anda Berhasil Login');
            }else {
                Auth::logout();
                return redirect()->route('login')->withErrors('Anda tidak memiliki akses')->withInput();
            }
        } else {
            return redirect()->route('login')->withErrors('Email dan password yang dimasukan tidak sesuai')->withInput();
        }
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required|min:5',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6',
                'nip' => 'required|min:18',
                'jabatan' => 'required',
            ],
            [
                'fullname.required' => 'Full Name wajib diisi.',
                'fullname.min' => 'Full Name minimal 5 karakter.',
                'email.required' => 'Email wajib diisi.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',
                'nip.required' => 'NIP wajib diisi.',
                'nip.min' => 'NIP minimal 18 angka.',
                'jabatan.required' => 'Jabatan wajib diisi.',
            ]
        );

        $inforegister = [
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nip' => $request->nip,
            'jabatan' => $request->jabatan
        ];

        $user = User::create($inforegister);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, Silahkan login.');
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }
}
