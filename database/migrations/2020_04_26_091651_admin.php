<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('admin', function (Blueprint $table) {
        
         $table->increments('id_admin');
         $table->string('nama_admin',255);
         $table->string('username', 255);
         $table->string('password', 255);
         $table->string('alamat', 255);
         $table->string('no_hp', 255);

         $table->rememberToken();
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
        Schema::dropIfExists('admin');
    }
}
