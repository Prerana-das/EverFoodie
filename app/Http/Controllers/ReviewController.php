<?php

namespace App\Http\Controllers;
use Auth;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if(Auth::check()){
            $user = Auth::user();
            if($user->user_type != 'User'){
                return response()->json([
                    'message' => "You are not a User!",
                ], 422);
            }
        }
        // $data['user_id'] = Auth::user()->id;
        Review::create($data);
        $review_data= Review::with('user')->orderBy('id','desc')->first();

        // $avgRat =  Review::select('res_id', DB::raw( 'cast(AVG(rating) as decimal(10,2)) AS averageRating'))
        // ->groupBy('res_id');
        // \Log::info($avgRat);
        // User::where('id',$data['user_id'])->update([
        //     'o' => $avgRat[0]['averageRating']
        // ]);

        return response()->json([
            'review_data' => $review_data,
            'success' => true
        ],201);
    }

    public function all_review(Request $request){
        $total = $request->total;
        $data = Review::with('user')->orderBy('id','desc');
        return $data->paginate($total);
    }


}
