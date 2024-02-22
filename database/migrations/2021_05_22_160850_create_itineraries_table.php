<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offroad_itineraries', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id');
            $table->string('itinerary_title');
            $table->mediumText('itinerary_image')->nullable();
            $table->longText('itinerary_description');
           $table->foreign('tour_id')->references('id')->on('offroad_tours')->onDelete('cascade');
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
        Schema::dropIfExists('itineraries');
    }
}
