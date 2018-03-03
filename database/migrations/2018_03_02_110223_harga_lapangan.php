<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HargaLapangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_lapangan', function (Blueprint $table){
            $table->bigInteger('harga_id')->unsigned();
            $table->foreign('harga_id')->references('id')->on('harga')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->bigInteger('lapangan_id')->unsigned();
            $table->foreign('lapangan_id')->references('id')->on('lapangan')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
