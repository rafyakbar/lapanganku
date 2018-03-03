<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating', function (Blueprint $table){
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->bigInteger('sportcenter_id')->unsigned();
            $table->foreign('sportcenter_id')->references('id')->on('sportcenter')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->smallInteger('bintang');
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
