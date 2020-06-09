<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [
        'user_id','total_price','res_id','payment_method','order_description'
    ];


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function order_details(){
        return $this->hasMany('App\Order_details','order_id');
    }

    




}
