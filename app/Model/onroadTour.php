<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class onroadTour extends Model
{
    protected $table="onroad_tours";

    function myitinarary(){
        return $this->hasMany('App\Model\OnroadItinerary','onroadtour_id','id');
    }
    function onroadcalendarevents(){
        return $this->hasMany('App\Model\OnroadEvent','tour_id','id')->orderBy('start_date', 'asc');
    }
    function onroadkeyinfo(){
        return $this->hasMany('App\Model\OnroadKeyInfo','tour_id','id');
    }

}
