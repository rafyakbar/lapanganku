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
            $table->string('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->string('nama');
            $table->text('dir');
            $table->text('alamat');
            $table->text('keterangan');
            $table->integer('max_pelunasan_jam')->default(23);
            $table->boolean('bisa_transfer')->default(false);
            $table->boolean('blokir')->default(false);
            $table->text('hari_libur')->default('');
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
