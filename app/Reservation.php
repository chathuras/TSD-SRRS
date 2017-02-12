<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function resources() {
        return $this->belongsTo('App\Resources', 'resource_id');
    }
}
