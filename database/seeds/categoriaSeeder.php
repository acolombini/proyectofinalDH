<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categorias")->insert([
            [
                "id" => 1,
                "nombre_categoria" => "Otras Categorias"
            ],
            [
                "id" => 2,
                "nombre_categoria" => "Acción"
            ],
            [
                "id" => 3,
                "nombre_categoria" => "Aventura"
            ],
            [
                "id" => 4,
                "nombre_categoria" => "Casual"
            ],
            [
                "id" => 5,
                "nombre_categoria" => "Conducción"
            ],
            [
                "id" => 6,
                "nombre_categoria" => "Deportes"
            ],
            [
                "id" => 7,
                "nombre_categoria" => "Estrategia"
            ],
            [
                "id" => 8,
                "nombre_categoria" => "MMO"
            ],
            [
                "id" => 9,
                "nombre_categoria" => "Rol"
            ],
            [
                "id" => 10,
                "nombre_categoria" => "Simulación"
            ]
        ]);
    }
}
