<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->dropColumn('ciudad_id');
            $table->dropColumn('tipo_de_dni_id');
            $table->string('ciudad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('tipo_de_documento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_de_dni_id')->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->dropColumn('avatar');
            $table->dropColumn('ciudad');
            $table->dropColumn('provincia');
            $table->dropColumn('tipo_de_documento');
        });
    }
}
