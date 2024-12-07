<?php

namespace App\Http\Controllers;

use App\Models\Upah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function index(Request $request)
{
    // Ambil input dari request
    $query = $request->input('query');
    $month = $request->input('month'); // Bulan filter
    $year = $request->input('year');  // Tahun filter

    // Mulai query dengan model Upah
    $upahQuery = Upah::query();

    // Tambahkan filter pencarian jika ada input query
    if ($query) {
        $upahQuery->where(function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
              ->orWhere('nip', 'like', "%{$query}%");
        });
    }

    // Tambahkan filter bulan jika ada input bulan
    if ($month) {
        $upahQuery->where('bulan', $month);
    }

    // Tambahkan filter tahun jika ada input tahun
    if ($year) {
        $upahQuery->where('tahun', $year);
    }

    // Menambahkan filter untuk menampilkan hanya data gaji yang sesuai dengan nama user yang sedang login
    $user = Auth::user(); // Mendapatkan user yang sedang login
    $upahQuery->where('name', $user->name); // Memastikan hanya data gaji dengan nama yang sesuai

    // Eksekusi query dengan paginasi
    $gaji = $upahQuery->paginate(10);

    // Return view dengan data gaji
    return view('pegawai.index', ['gaji' => $gaji]);
}
}
