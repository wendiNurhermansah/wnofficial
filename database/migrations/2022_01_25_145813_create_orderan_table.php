<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderan', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('nama_cs')->nullable();;
            $table->string('telepon')->nullable();;
            $table->string('alamat')->nullable();;
            $table->string('jenis_pesanan_id')->nullable();;
            $table->string('jumlah_panjang')->nullable();;
            $table->string('jumlah_pendek')->nullable();;
            $table->string('harga')->nullable();;
            $table->string('total')->nullable();;
            $table->string('ket')->nullable();;
            $table->string('model_panjang')->nullable();;
            $table->string('model_pendek')->nullable();;
            $table->string('tanggal')->nullable();
            $table->string('gender_a')->nullable();
            $table->string('gender_b')->nullable();
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
        Schema::dropIfExists('orderan');
    }
}
