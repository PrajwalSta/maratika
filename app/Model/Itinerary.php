<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    
    protected $table='offroad_itineraries';
    public function offroad(){
        return $this->belongsTo('App\Model\offroadTour');
    }
}
