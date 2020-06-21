<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanan', function (Blueprint $table) {
            $table->increments('id_detail_pemesanan');
          
            $table->string('desain');
            $table->string('status');
            $table->integer('harga');
            $table->integer('jml_pesan');
            $table->integer('total');
            $table->integer('id_pemesanan')->unsigned();
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->integer('id_produk')->unsigned();
            $table->foreign('id_produk')->references('id_produk')->on('produk');  
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
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
         Schema::dropIfExists('detail_pemesanan');
    }
}
