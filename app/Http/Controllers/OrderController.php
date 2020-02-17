<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
class OrderController extends Controller
{
    //

    public function place_order(Request $request){
        $data = $request->all();
        return Order::create($data);
    }
}
