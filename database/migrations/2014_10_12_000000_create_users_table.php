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
            $table->bigIncrements('id');
            $table->string('foto_perfil')->nullable();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula', 10)->unique();
            $table->string('email');
            $table->string('password');
            $table->string('licencia')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime('last_login')->nullable();
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
