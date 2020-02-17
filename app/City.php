<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable= ['name','image'];


    // public function city(){
    //     return $this->belongsTo('App\City');
    // }

}
