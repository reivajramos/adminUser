<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->string('cantidad');
            $table->string('fechapedido');
            $table->bigInteger('estado');
            $table->bigInteger('productos_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->timestamps();
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
