<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['name', 'price', 'package_id'];

    public function days(){
        return $this->hasMany('App\Day');
    }
}
