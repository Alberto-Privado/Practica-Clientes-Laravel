<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id')->key();
            $table->string('nombre')->length(100);
            $table->string('apellidos')->length(200);
            $table->string('nacimiento')->length(100);
            $table->string('correo')->length(400);
            $table->integer('telefono')->length(9)->nullable();
            $table->string('clave')->length(40)->nullable();
            $table->string('direccion')->length(100)->nullable();
            $table->ipAddress('ip')->length(100)->nullable();
            $table->string('estadoCivil')->length(100)->nullable();
            $table->decimal('sueldoAnual', 9, 2)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['nombre', 'apellidos', 'nacimiento', 'correo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
