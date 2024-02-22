<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class offroadTour extends Model
{
    protected $table="offroad_tours";
    function myitinarary(){
        return $this->hasMany('App\Model\Itinerary','tour_id','id');
    }
    function myevents(){
        return $this->hasMany('App\Model\Event','tour_id','id')->orderBy('start_date', 'asc');
    }
    function offroadkeyinfo(){
        return $this->hasMany('App\Model\OffroadKeyInfo','tour_id','id');
    }
    
}
