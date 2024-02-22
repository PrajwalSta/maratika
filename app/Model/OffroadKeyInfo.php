<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OffroadKeyInfo extends Model
{
    protected $table="offroadkey_infos";
    public function offroadkeyinfo(){
        return $this->belongsTo('App\Model\offroadTour');
    }
}
