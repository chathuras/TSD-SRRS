<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{

    protected $table = 'resources';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function availability()
    {
        return $this->hasMany('App\Availability');
    }

    public function reservation()
    {
        return $this->hasMany('App\Reservation', 'resource_id');
    }
}
