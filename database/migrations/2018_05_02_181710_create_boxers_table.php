<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->unique();
            $table->string('weight_id');
            $table->string('distinction');
            $table->integer('wins')->default(0)->unsigned();
            $table->integer('losses')->default(0)->unsigned();
            $table->integer('draws')->default(0)->unsigned();
            $table->integer('knockouts')->default(0)->unsigned();
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('boxers');
    }
}
