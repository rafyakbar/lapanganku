<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MemberLapangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_lapangan', function (Blueprint $table){
            $table->bigInteger('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->bigInteger('lapangan_id')->unsigned();
            $table->foreign('lapangan_id')->references('id')->on('lapangan')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->integer('jumlah_bulan');
            $table->bigInteger('harga');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('hari');
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
