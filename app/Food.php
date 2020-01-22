<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable= ['name','description','image','quantity','category_id','res_id'];

    public function category(){
        return $this->hasMany('App\Category','category_id');
    }

    public function restaurant(){
        return $this->belongsTo('App\Restaurant','res_id');
    }
}
