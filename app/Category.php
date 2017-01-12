<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function resources() {
        return $this->hasMany('App\Resources');
    }
}
