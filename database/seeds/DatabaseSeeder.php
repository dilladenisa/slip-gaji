<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AccountSeeder::class); // Memanggil seeder lainnya
    }
}
