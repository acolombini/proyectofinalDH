<?php

use Illuminate\Database\Seeder;
use App\Marca;
class marcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("marcas")->insert([
            [
                "id" => 1,
                "nombre_marca" => "Sin Marca"
            ],
            [
                "id" => 2,
                "nombre_marca" => "ESRB"
            ],
            [
                "id" => 3,
                "nombre_marca" => "Rockstars Games"
            ],
            [
                "id" => 4,
                "nombre_marca" => "Bullfrog Productions"
            ]
        ]);
        factory(Marca::class, 40)->create();
    }
}
