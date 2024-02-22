<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    protected $fillable = [
        'notice_title','notice_description', 'notice_image',
    ];
}
