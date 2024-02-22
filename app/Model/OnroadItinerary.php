<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OnroadItinerary extends Model
{
    
    protected $table='onroad_itineraries';
    public function onroad(){
        return $this->belongsTo('App\Model\onroadTour')->orderBy('id', 'ASC');;
    }
}
