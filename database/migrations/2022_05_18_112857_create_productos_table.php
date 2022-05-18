<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('codigo_descripcion');
            $table->string('descripcion');
            $table->string('especificacion');
            $table->string('presentacion');
            $table->string('precio_1');
            $table->string('precio_2');
            $table->string('precio_3');
            $table->bigInteger('proveedores_id')->unsigned();
            $table->bigInteger('categorias_id')->unsigned();
            $table->timestamps();
             $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade');
             $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
