<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloVendedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_vendedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_venta');
            $table->integer('cantidad');
            $table->bigInteger('articulo_id')->unsigned()->nullable();
            $table->bigInteger('vendedor_id')->unsigned()->nullable();
            $table->timestamps();
            //Creamos la foreign key ha dos alumno_id y modulo_id
            $table->foreign('articulo_id')
            ->references('id')
            ->on('articulos')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->foreign('vendedor_id')
            ->references('id')
            ->on('vendedors')
            ->onDelete('set null')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_vendedor');
    }
}
