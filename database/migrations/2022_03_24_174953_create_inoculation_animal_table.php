<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInoculationAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inoculation_animal', function (Blueprint $table) {
            $table->unsignedBigInteger('inoculation_id');
            $table->unsignedBigInteger('animal_id');

            $table->foreign('inoculation_id')->references('id')->on('inoculations');
            $table->foreign('animal_id')->references('id')->on('animals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inoculation_animal');
    }
}
