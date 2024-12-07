<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upah; // Model untuk tabel upahs (gaji)
use App\Models\User;
use Illuminate\Support\Facades\Session;

class McController extends Controller
{
    // Tampilkan daftar pengguna atau data utama
    function mastercontrol()
    {
        $data = Upah::all(); // Mengambil semua data gaji dari tabel upahs
        $allPeople = User::all()->count();
        $admin = user::where('role','admin')->count();
        $pegawai = user::where('role','pegawai')->count();
        return view('halaman_mc.mastercontrol', ['gaji' => $data,'allPeople' => $allPeople,'admin'=> $admin,'pegawai'=> $pegawai]);
    }

    // Tampilkan form tambah data gaji
    function create()
    {
        return view('halaman_mc.gaji-create');
    }

    // Tambah data gaji baru
    function addGaji(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'nip' => 'required|unique:upahs,nip',
            'jabatan' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'tunjangan_kinerja' => 'required|numeric',
            'transport' => 'required|numeric',
            'uang_makan' => 'required|numeric',
            'koperasi' => 'required|numeric',
            'ptwp' => 'required|numeric',
            'ikahi' => 'required|numeric',
            'ipaspi' => 'required|numeric',
            'dana_sosial' => 'required|numeric',
            'dharmayukti' => 'required|numeric',
            'pphim' => 'required|numeric',
            'infaq_mesjid' => 'required|numeric',
            'pot_lain_lain' => 'required|numeric',
            'jumlah_pot' => 'required|numeric',
            'jumlah_akhir' => 'required|numeric',
        ]);

        // Simpan data ke tabel upahs
        Upah::create([
            'bulan' => $request->bulan,
            'name' => $request->name,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'gaji' => $request->gaji,
            'tunjangan_kinerja' => $request->tunjangan_kinerja,
            'transport' => $request->transport,
            'uang_makan' => $request->uang_makan,
            'koperasi' => $request->koperasi,
            'ptwp' => $request->ptwp,
            'ikahi' => $request->ikahi,
            'ipaspi' => $request->ipaspi,
            'dana_sosial' => $request->dana_sosial,
            'dharmayukti' => $request->dharmayukti,
            'pphim' => $request->pphim,
            'infaq_mesjid' => $request->infaq_mesjid,
            'pot_lain_lain' => $request->pot_lain_lain,
            'jumlah_pot' => $request->jumlah_pot,
            'jumlah_akhir' => $request->jumlah_akhir,
        ]);

        return redirect('/mastercontrol')->with('success', 'Data gaji berhasil ditambahkan');
    }

    // Tampilkan form edit data gaji
    function edit($id)
    {
        $data = Upah::find($id); // Ambil data berdasarkan ID
        if (!$data) {
            return redirect('/mastercontrol')->withErrors(['error' => 'Data tidak ditemukan']);
        }
        return view('halaman_mc.gajiedit', ['gaji' => $data]);
    }

    // Proses update data gaji
    function editReq(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'nip' => 'required|unique:upahs,nip,' . $id,
            'jabatan' => 'required|string|max:255',
            'gaji' => 'required|numeric',
        ]);

        $gaji = Upah::find($id);
        if (!$gaji) {
            return redirect('/mastercontrol')->withErrors(['error' => 'Data tidak ditemukan']);
        }

        $gaji->update($request->all());
        return redirect('/mastercontrol')->with('success', 'Data gaji berhasil diperbarui');
    }

    // Hapus data gaji
    function hapus($id)
    {
        $gaji = Upah::find($id);
        if (!$gaji) {
            return redirect('/mastercontrol')->withErrors(['error' => 'Data tidak ditemukan']);
        }

        $gaji->delete();
        return redirect('/mastercontrol')->with('success', 'Data gaji berhasil dihapus');
    }
}
