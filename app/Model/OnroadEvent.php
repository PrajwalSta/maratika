<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OnroadEvent extends Model
{
    protected $table='onroad_events';
    public function onroadevents(){
        return $this->belongsTo('App\Model\onroadTour')->orderBy('created_at','DESC');
    }
}
