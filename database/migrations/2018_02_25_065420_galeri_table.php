<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GaleriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('sportcenter_id')->unsigned();
            $table->foreign('sportcenter_id')->references('id')->on('sportcenter')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->text('dir');
            $table->text('keterangan');
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
