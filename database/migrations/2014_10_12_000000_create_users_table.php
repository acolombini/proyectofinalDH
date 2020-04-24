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
        Schema::create('users', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            $table->string('nombre', 30);
            $table->string('apellido', 30);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('telefono')->nullable();
            $table->integer('documento')->nullable();
            $table->date('fecha_de_nacimiento')->nullable();
            $table->string('domicilio', 50)->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->string('estado_de_usuario', 20)->default('activo');
            $table->unsignedBigInteger('tipo_de_dni_id')->nullable();
            $table->unsignedBigInteger('tipo_de_usuario_id')->default(1);
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
    }
}
