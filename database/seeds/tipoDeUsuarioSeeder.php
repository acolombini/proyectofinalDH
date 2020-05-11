<?php

use Illuminate\Database\Seeder;
use App\tipoDeUsuario;
class tipoDeUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipoDeUsuario::create(['tipo' => 'normal']);
        tipoDeUsuario::create(['tipo' => 'administrador']);
    }
}
