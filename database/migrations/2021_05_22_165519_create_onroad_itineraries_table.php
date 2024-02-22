<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnroadItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onroad_itineraries', function (Blueprint $table) {
            $table->id();
            $table->integer('onroadtour_id');
            $table->string('itinerary_title');
            $table->mediumText('itinerary_image')->nullable();
            $table->longText('itinerary_description');
            $table->foreign('tour_id')->references('id')->on('onroad_tours')->onDelete('cascade');
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
        Schema::dropIfExists('onroad_itineraries');
    }
}
