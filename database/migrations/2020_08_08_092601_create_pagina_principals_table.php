<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginaPrincipalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagina_principals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('historia');
            $table->string('mision');
            $table->string('vision');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo_contacto');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagina_principals');
    }
}
