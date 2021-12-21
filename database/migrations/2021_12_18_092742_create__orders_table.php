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
            $table->bigInteger('id')->nullable()->default(1);
            $table->string('kode', 20);
            $table->string('nama', 191);
            $table->string('gambar', 191);
            $table->string('no_hp', 191);
            $table->string('alamat', 191);
            $table->string('harga_vendor', 191);
            $table->string('harga_wn', 191);
            $table->string('tanggal_order', 191);
            $table->string('estimasi',191);
            $table->string('jenis_pemesanan',191);
            $table->string('kuantiti', 191);
            $table->string('jumlah_panjang',191);
            $table->string('jumlah_pendek',191);
            $table->string('status',191);
            $table->string('ket',191);
            $table->string('dp', 191);
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
