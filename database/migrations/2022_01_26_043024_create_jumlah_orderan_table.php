<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahOrderanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumlah_orderan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_orderan');
            $table->string('jenis_pesanan')->nullable();
            $table->string('jenis_lengan')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('total')->nullable();
            
           
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
        Schema::dropIfExists('jumlah_orderan');
    }
}
