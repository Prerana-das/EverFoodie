<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;
use Illuminate\Support\Facades\Redirect;
class CheckoutController extends Controller
{
    //


    public function stripe(){
        return view('stripe');
     }

     public function stripePayment(Request $request){



           Stripe::setApiKey(env('STRIPE_SECRET'));
           Charge::create([

            'amount'=>$request->total*100,
            'currency' => 'usd',
            'description' => 'Example DES',
            'source' => $request->get('stripeToken'),
            'metadata'=>[
                'order_id'=>1129,
            ]
            ]);

            // Order::create([
            //     'user_id' =>$request->user_id,
            //     'total_price'=> $request->total       
            //   ]);


            //return back()->with('success_message','thank you');

            //return  redirect("/checkout")->with('success_message',"thank you");
            
            return Redirect::back()->with('success_message',"Thank You. Your payment is successful!");


     }


}
