<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('transfer', function (Blueprint $table) {
            $table->increments('id_transfer');
           
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->integer('id_detail_pemesanan')->unsigned();
            $table->foreign('id_detail_pemesanan')->references('id_detail_pemesanan')->on('detail_pemesanan');
            $table->string('foto_transfer')->nullable();
            $table->string('metode_pembayaran')->nullable();
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
         Schema::dropIfExists('transfer');
    }
}
