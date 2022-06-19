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
            $table->string('nama_cs')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('telepon')->nullable();
            $table->string('ket')->nullable();
            $table->string('sub_total')->nullable()->default(0);
            $table->string('gambar')->nullable();
            $table->string('status')->nullable();
            $table->string('status_bayar')->nullable();
            $table->string('uang_muka')->nullable()->default(0);
            $table->string('hpp_produksi')->nullable()->default(0);
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
