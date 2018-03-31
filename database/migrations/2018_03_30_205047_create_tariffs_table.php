<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTariffsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price');
            $table->integer('taxes');
            $table->integer('fees');
            $table->string('promo');
            $table->string('condition');
            $table->string('policy');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('room_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tariffs');
    }
}
