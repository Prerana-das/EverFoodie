<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    //

    public function allFood(){
        return Food::with('category','restaurant')->get();
    }
    public function storeFood(Request $request){
        $data = $request->all();
        return Food::create($data);
    }

    public function updateFood(Request $request){
        $data = $request->all();
        \Log::info($data);
        return Food::where('id',$data['id'])->update($data);
    }

    public function deleteFood(Request $request){
        $data = $request->all();
        return Food::where('id',$data['id'])->delete();
    }

    

    public function all_food_of_this_res($id){
        return Food::with('category','restaurant')->where('res_id',$id)->get();
    }


}
