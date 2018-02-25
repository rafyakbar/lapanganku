<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table){
            $table->string('id')->primary()->unique();
            $table->string('kabupaten_id');
            $table->foreign('kabupaten_id')->references('id')->on('kabupaten')->onUpdate('CASCADE')->onDelete('CASCADE');
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
