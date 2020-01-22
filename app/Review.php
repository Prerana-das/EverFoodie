<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable= ['description','date','user_id','res_id'];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function restaurants(){
        return $this->belongsTo('App\Restaurant','res_id');
    }
}
