<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

use App\Order_details;
class OrderController extends Controller
{
    //

    public function place_order(Request $request){
       // $data = $request->all();
        //$order= Order::create($data);


        $data = $request->all();
        $carts = $data['carts'];
        unset($data['carts']);


        $order =  Order::create($data);

        $size = sizeof($carts);
        $orderCartItem = [];
        for($i = 0 ; $i<$size; $i++){
            $ob = ([
                'order_id' => $order->id,
                'item_id' => $carts[$i]['id'],
                'quantity' => $carts[$i]['amount']
            ]);
            array_push($orderCartItem,$ob);
            
        }
         $order['carts']= $carts;
    
        Order_details::insert($orderCartItem);

        return response()->json([
            'order' => $order,
            'success' => true
        ],200);
    }
}
