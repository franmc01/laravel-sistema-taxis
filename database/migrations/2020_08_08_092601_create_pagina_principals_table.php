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
            $table->mediumText('historia');
            $table->mediumText('mision');
            $table->mediumText('vision');
            $table->string('direccion');
            $table->string('telefono1');
            $table->string('telefono2');
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
