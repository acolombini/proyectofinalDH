<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(marcasSeeder::class);
        $this->call(categoriaSeeder::class);
        $this->call(productSeeder::class);
        $this->call(UserSeeder::class);
    }
}
