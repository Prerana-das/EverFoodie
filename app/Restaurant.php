<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $fillable= ['name','description','image','city_id','area_id'];

    public function city(){
        return $this->belongsTo('App\City','city_id');
    }

    public function area(){
        return $this->belongsTo('App\Area','area_id');
    }


}
