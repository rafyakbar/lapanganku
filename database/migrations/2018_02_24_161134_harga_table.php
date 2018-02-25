<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('sportcenter_id')->unsigned();
            $table->foreign('sportcenter_id')->references('id')->on('sportcenter')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->bigInteger('per_jam');
            $table->time('jam_awal');
            $table->time('jam_akhir');
            $table->text('hari');
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
