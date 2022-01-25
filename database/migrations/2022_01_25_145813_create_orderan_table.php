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
            $table->string('kode');
            $table->string('nama_cs');
            $table->string('telepon');
            $table->string('alamat');
            $table->string('jenis_pesanan_id');
            $table->string('jumlah_panjang');
            $table->string('jumlah_pendek');
            $table->string('harga');
            $table->string('total');
            $table->string('ket');
            $table->string('model_panjang');
            $table->string('model_pendek');
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
