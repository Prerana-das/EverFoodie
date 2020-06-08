<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Food extends Model
{
    //
    protected $fillable= ['name','description','image','price','discount_price','quantity','category_id','res_id'];

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function restaurant(){
        return $this->belongsTo('App\User','res_id');
    }

    public function order_details()
    {
        return $this->hasMany('App\Order_details');
    }

    
}
