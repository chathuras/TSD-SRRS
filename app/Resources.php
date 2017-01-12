<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{

    public function category() {
        return $this->belongsTo('App\Category');
    }

    protected $table = 'resources';
}
