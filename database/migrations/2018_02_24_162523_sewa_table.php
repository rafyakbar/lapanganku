<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->bigInteger('lapangan_id')->unsigned();
            $table->foreign('lapangan_id')->references('id')->on('lapangan')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->bigInteger('harga');
            $table->string('status');
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_selesai');
            $table->boolean('registrasi')->default(false);
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
