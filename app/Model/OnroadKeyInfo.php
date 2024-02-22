<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OnroadKeyInfo extends Model
{
    protected $table="onroadkey_infos";
    public function onroadkeyinfo(){
        return $this->belongsTo('App\Model\onroadTour');
    }
}
