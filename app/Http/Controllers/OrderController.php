<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\User;
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

    public function get_user_order(Request $request){
        $user = $request->user;
        return Order::with('user','order_details.food')->where('user_id',$user)->orderBy('id','desc')->get();
        
    }

    public function user_order_cancel(Request $request){
        return Order::where('id',$request->id)->delete();
        // if($order){
        //     \Mail::send('email/test', $data, function ($message){
        //         $message->from('demo.com', 'demo');
        //         $message->to( demo)->subject('Cancel ');
        //     });
        // }
        // return $order;
    }

    public function cancel_order(Request $request){
       
        // \Log::info($user);
            $dataa = $request->all();
            $user = User::where('id',$dataa['user_id'])->get();
            Order::where('id',$dataa['id'])->delete();
            foreach ($user as $value){
                $data = [
                    'email'   => $value['email'],
                    'subject' => 'hkjhkd'
                ];
                \Mail::send('email/test', $data, function ($message) use ($data){
                    $message->from('preranadas97@gmail.com','Order cancelled');
                    $message->to($data['email'])->subject('Order cancelled');
                });
            }

            return;  
        
      }
}
