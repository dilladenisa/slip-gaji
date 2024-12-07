<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabel 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // Mengganti $table->id() dengan $table->bigIncrements('id')
            $table->string('name');
            $table->string('nip')->unique();
            $table->string('jabatan');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'pegawai'])->default('pegawai');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Tabel 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabel 'sessions'
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            // Menyesuaikan dengan Laravel 6 menggunakan unsignedBigInteger untuk foreign key
            $table->unsignedBigInteger('user_id')->nullable()->index(); 
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
}
