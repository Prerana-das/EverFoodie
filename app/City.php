<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable= ['name','image'];


    public function area(){
        return $this->hasOne('App\Area','city_id');
    }

}
