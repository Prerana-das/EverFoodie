<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodTag extends Model
{
    //
    protected $fillable= ['food_id','tag_id','res_id'];

    public function food(){
        return $this->hasMany('App\Food','food_id');
    }

    public function tags(){
        return $this->hasMany('App\Tag','tag_id');
    }

    public function restaurant(){
        return $this->hasMany('App\User','res_id');
    }


}
