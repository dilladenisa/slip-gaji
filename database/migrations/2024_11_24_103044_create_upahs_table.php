<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upahs', function (Blueprint $table) {
            $table->bigIncrements('id');
        
            // Informasi Pekerja
            $table->string('name');
            $table->string('nip', 20)->unique(); // Panjang maksimal disesuaikan
            $table->string('jabatan');
        
            // Gaji
            $table->string('bulan', 15); // Gunakan VARCHAR untuk fleksibilitas
            $table->string('tahun', 15); // Gunakan VARCHAR untuk fleksibilitas
            $table->bigInteger('gaji'); // Gaji tanpa desimal
            $table->bigInteger('tunjangan_kinerja');
            $table->bigInteger('uang_makan');
            $table->bigInteger('transport');
        
            // Potongan
            $table->bigInteger('koperasi')->default(0); // Default 0 untuk mempermudah perhitungan
            $table->bigInteger('ptwp')->default(0);
            $table->bigInteger('ikahi')->default(0);
            $table->bigInteger('ipaspi')->default(0);
            $table->bigInteger('dana_sosial')->default(0);
            $table->bigInteger('pphim')->default(0);
            $table->bigInteger('dharmayukti')->default(0);
            $table->bigInteger('infaq_mesjid')->default(0);
            $table->bigInteger('pot_lain_lain')->default(0);
        
            // Total Potongan dan Jumlah Akhir
            $table->bigInteger('jumlah_pot')->default(0); // Total potongan dihitung di aplikasi
            $table->bigInteger('jumlah_akhir')->default(0); // Jumlah akhir dihitung di aplikasi
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upahs');
    }
}
