<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisbahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('produk', function (Blueprint $table) {
            $table->string('jenis_bahan')->nullable();
           
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn(['jenis_bahan'  ]);
        });
    }
    
}
