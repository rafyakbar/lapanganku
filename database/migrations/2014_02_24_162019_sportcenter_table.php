<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SportcenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sportcenter', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('kelurahan_id');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nama');
            $table->text('dir');
            $table->text('alamat');
            $table->text('keterangan');
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
        //
    }
}
