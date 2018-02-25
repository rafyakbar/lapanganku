<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table){
            $table->string('id')->primary()->unique();
            $table->string('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nama');
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
