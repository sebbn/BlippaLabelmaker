<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Event extends Model
{
    protected $primaryKey = "eventId";

    protected $dates = [
        'created_at', 
        'updated_at', 
    ];
}
