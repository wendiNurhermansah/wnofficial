<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisOrderanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_orderan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_orders');
            $table->foreign('id_orders')
            ->references('id')->on('orders')
            ->onDelete('cascade');
            $table->integer('id_jenis_barang');
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_orderan');
    }
}
