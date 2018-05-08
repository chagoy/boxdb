<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aside')->unsigned();
            $table->foreign('aside')->references('id')->on('boxers');
            $table->integer('bside')->unsigned();
            $table->foreign('bside')->references('id')->on('boxers');
            $table->integer('card_id')->unsigned();
            $table->boolean('main_event');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('fights');
    }
}
