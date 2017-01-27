<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    public function resources() {
        return $this->belongsTo('App\Resources');
    }
}
