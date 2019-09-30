<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    //
    public function itinaries(){
        return $this->hasMany('App\Itinary');
    }
}
