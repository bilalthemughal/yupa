<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //

    public function packages(){
        return $this->hasMany('App\Packege');
    }
}
