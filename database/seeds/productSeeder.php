<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 10)->create();
    }
}
