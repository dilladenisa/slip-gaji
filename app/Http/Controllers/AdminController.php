<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Todo;
use App\Models\Upah;
use App\Models\User;
use PDF; // Ganti dengan alias Facade untuk DomPDF
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $allPeople = User::count();
        $admin = User::where('role', 'admin')->count();
        $pegawai = User::where('role', 'pegawai')->count();

        return view('admin.index', [
            'allPeople' => $allPeople,
            'admin' => $admin,
            'pegawai' => $pegawai,
        ]);
    }

    public function gaji(Request $request)
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

    // Eksekusi query dengan paginasi
    $gaji = $upahQuery->paginate(10);

    // Return view dengan data gaji
    return view('admin.gaji', ['gaji' => $gaji]);
}


    public function gajiCreate()
    {
        return view('admin.create-gaji');
    }

    public function addGaji(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
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

        Upah::create($validated);

        return redirect()->route('gaji')
            ->with('success', 'Gaji created successfully.');
    }

    public function hapusGaji($id)
    {
        $gaji = Upah::find($id);

        if ($gaji) {
            $gaji->delete();
            return redirect()->back()->with('success', 'Data gaji berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Data gaji tidak ditemukan.');
    }

    public function gajiEdit($id)
    {
        $gaji = Upah::find($id);

        return view('admin.edit-gaji', ['gaji' => $gaji]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bulan' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric',
            'jabatan' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'tunjangan_kinerja' => 'required|numeric',
            'jumlah_pot' => 'required|numeric',
            'jumlah_akhir' => 'required|numeric',
        ]);

        $data = Upah::findOrFail($id);

        $data->update($validated);

        return redirect()->route('gaji')->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function cetak()
    {
        return view('admin.cetak');
    }

    public function cetakGaji(Request $request)
    {
        $bulan = $request->input('bulan');
        $dataGaji = Upah::when($bulan, function ($query) use ($bulan) {
            return $query->where('bulan', $bulan);
        })->get();

        return view('admin.proses-gaji', compact('dataGaji', 'bulan'));
    }

    public function cetakPersonal(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
        ]);

        $dataGaji = Upah::whereIn('id', $validated['ids'])->get();

        return response()->json([
            'status' => 'success',
            'data' => $dataGaji,
        ]);
    }
}
