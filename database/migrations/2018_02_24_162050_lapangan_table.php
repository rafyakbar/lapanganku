<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LapanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapangan', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('sportcenter_id')->unsigned();
            $table->foreign('sportcenter_id')->references('id')->on('sportcenter')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('jenis_id')->unsigned()->nullable();
            $table->foreign('jenis_id')->references('id')->on('jenis')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->string('keterangan');
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
