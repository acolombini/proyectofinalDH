<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [   'nombre' => 'Admin',
                'apellido' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456'),
                'estado_de_usuario'=> 'activo',
                'tipo_de_usuario_id' => 2
            ]);
        User::create(
            [   'nombre' => 'user',
                'apellido' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('123456'),
                'estado_de_usuario'=> 'activo',
                'tipo_de_usuario_id' => 1
            ]);
        User::create(
            [   'nombre' => 'user',
                'apellido' => 'user',
                'email' => 'aaa@aaa.com',
                'password' => Hash::make('123456'),
                'estado_de_usuario'=> 'activo',
                'tipo_de_usuario_id' => 1
            ]);
        User::create(
            [   'nombre' => 'admin',
                'apellido' => 'admin',
                'email' => 'admin@aaa.com',
                'password' => Hash::make('123456'),
                'estado_de_usuario'=> 'activo',
                'tipo_de_usuario_id' => 2
            ]);
        User::create(
            [   'nombre' => 'Santiago',
                'apellido' => 'Argilla',
                'email' => 'sargilla@digitalhouse.com',
                'password' => Hash::make('123456'),
                'estado_de_usuario'=> 'activo',
                'tipo_de_usuario_id' => 1
            ]);
        User::create(
            [   'nombre' => 'Ignacio',
                'apellido' => 'Marti',
                'email' => 'mfignacio97@hotmail.com',
                'password' => Hash::make('123456'),
                'estado_de_usuario'=> 'activo',
                'tipo_de_usuario_id' => 2
            ]);
        User::create(
            [   'nombre' => 'Anibal',
                'apellido' => 'Colombini',
                'email' => 'acolombini@gmail.com',
                'password' => Hash::make('123456'),
                'estado_de_usuario'=> 'activo',
                'tipo_de_usuario_id' => 2
            ]);

    }
}
