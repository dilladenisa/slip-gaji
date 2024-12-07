<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upah extends Model
{
    protected $fillable = [
        "bulan",
        "tahun",
        "name",
        "nip",
        "jabatan",
        "gaji",
        "tunjangan_kinerja",
        "transport",
        "uang_makan",
        "koperasi",
        "ptwp",
        "ikahi",
        "ipaspi",
        "pphim",
        "dharmayukti",
        "dana_sosial",
        "infaq_mesjid",
        "pot_lain_lain",
        "jumlah_pot",
        "jumlah_akhir",
    ];
}
