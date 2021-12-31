<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->nullable();
            $table->string('nama', 191)->nullable();
            $table->string('gambar', 191)->nullable();
            $table->string('alamat', 191)->nullable();
            $table->string('no_hp', 191)->nullable();
            $table->string('tanggal_order', 191)->nullable();
            $table->string('estimasi',191)->nullable();
            $table->string('status',191)->nullable();
            $table->integer('total_semua')->nullable();
            $table->integer('qty_semua')->nullable();
            $table->string('ket',191)->nullable();
            $table->integer('dp')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
