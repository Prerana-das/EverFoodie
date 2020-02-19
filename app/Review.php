<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable= ['rating','description','user_id','res_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
