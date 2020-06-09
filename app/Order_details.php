<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    //

    protected $fillable = [
        'order_id','item_id','res_id','quantity'
    ];

    public function order(){
        return $this->belongsTo('App\Order','order_id');
    }

    public function food()
    {
        return $this->belongsTo('App\Food','item_id');
    }



}
