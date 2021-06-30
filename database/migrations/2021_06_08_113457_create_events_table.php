<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('goal');
            $table->integer('penality');
            $table->integer('freekick');
            $table->integer('shot');
            $table->integer('assit');
            $table->integer('pass');
            $table->integer('interception');
            $table->integer('position');
            $table->integer('tackle');
            $table->integer('drible');
            $table->integer('yellow');
            $table->integer('red');
            $table->unsignedInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
