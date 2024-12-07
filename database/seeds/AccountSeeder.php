<?php

use Illuminate\Database\Seeder;
use App\Models\User; // Sesuaikan namespace

class AccountSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
                'jabatan' => 'bendahara',
                'nip' => '1234567890',
            ],
            [
                'name' => 'Pegawai',
                'email' => 'pegawai@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'pegawai',
                'jabatan' => 'hakim',
                'nip' => '2345678901',
            ],
            [
                'name' => 'denisa',
                'email' => 'denisa@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'pegawai',
                'jabatan' => 'pranata komputer',
                'nip' => '234567890',
            ],
        ]);
    }
}
