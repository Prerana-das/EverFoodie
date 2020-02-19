<?php

namespace App\Http\Controllers;
use Auth;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //

    public function reviews(Request $request)
    {
       $data = $request->all();
       if(!Auth::check()){
        return response()->json([
                'message' => "You are not Authenticate User!",
            ], 401);
        }
        $data['user_id'] = Auth::user()->id;
        $review_data= Review::create($data);

        return response()->json([
            'review_data' => $review_data,
            'success' => true
        ],201);

    }


    public function all_review(){
        return Review::with('user')->get();
    }


}
