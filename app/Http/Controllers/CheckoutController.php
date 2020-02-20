<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    //


    public function stripe(){
        return view('stripe');
     }

     public function stripePayment(Request $request){



            Stripe::setApiKey(env('STRIPE_SECRET'));
           Charge::create([
            'amount' => 999,
            //'amount'=>$request->get('total'),
            'currency' => 'usd',
            'description' => 'Example DES',
            'source' => $request->get('stripeToken'),
            'metadata'=>[
                'order_id'=>1129,
            ]
            ]);


            return back()->with('success_message','thank you');

     }


}
