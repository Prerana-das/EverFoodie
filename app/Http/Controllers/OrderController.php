<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
class OrderController extends Controller
{
    //

    public function place_order(Request $request){
        $data = $request->all();
        $order= Order::create($data);

        return response()->json([
            'order' => $order,
            'success' => true
        ],200);
    }
}
