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


        $order =  Order::create([
            'user_id'=>$data['user_id'],
            'total_price'=>$data['total_price'],
            'res_id'=>$data['res_id'],
            'order_description'=>$data['order_description'],
        ]);

        $size = sizeof($carts);
        $orderCartItem = [];
        for($i = 0 ; $i<$size; $i++){
            $ob = ([
                'order_id' => $order->id,
                'item_id' => $carts[$i]['id'],
                'res_id'=>$data['res_id'],
                'quantity' => $carts[$i]['amount'],
                'payment_method'=>$data['payment_method'],
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

    
    public function get_all_order(Request $request){
        $total = $request->total;
        $restaurant = $request->restaurant;
        $data = Order::with('user','order_details.food')->where('res_id',$restaurant)->orderBy('id','desc');
        return $data->paginate($total);
    }



}
