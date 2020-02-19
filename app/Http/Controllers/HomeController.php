<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(Request $request){
       
       
        if($request->segment(1)=='admin'){  //segment(1) is for if after slag had anything then it's get this url ,ex admin '/admin/'
           
            if(!Auth::check())
            {
                return redirect("/login");
            }

            if (Auth::user()->user_type !=='Admin') {
                return redirect("/");
            }
            return view('admin');
            
        }

        if($request->segment(1)=='restaurantProfile'){
            if(!Auth::check())
            {
                return redirect("/login");
            }

            if (Auth::user()->user_type !=='Restaurant') {
                return redirect("/");
            }
            
            return view('restaurantProfile');

        }

        if($request->segment(1)=='checkout'){
            if(!Auth::check())
            {
                return redirect("/login");
            }

            if (Auth::user()->user_type !=='User') {
                return redirect("/");
            }
            
            return view('checkout');

        }

        
            return view('welcome');
        }




       


}
