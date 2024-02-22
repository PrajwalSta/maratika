<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function offroadevents(){
        return $this->belongsTo('App\Model\offroadTour');
    }
   
}
