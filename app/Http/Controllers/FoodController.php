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
    public function all_food_pagi(Request $request){
        $total = $request->total;
        $data = Food::with('category','restaurant')->orderBy('id','desc');
        return $data->paginate($total);
    }
    public function storeFood(Request $request){
        $data = $request->all();
        Food::create($data);
        return Food::with('category','restaurant')->orderBy('id','desc')->first();
    }

    public function updateFood(Request $request){
        $data = $request->all();
        \Log::info($data);
        Food::where('id',$data['id'])->update($data);
        return Food::with('category','restaurant')->where('id',$data['id'])->orderBy('id','desc')->first();
    }

    public function deleteFood(Request $request){
        $data = $request->all();
        return Food::where('id',$data['id'])->delete();
    }

    

    public function all_food_of_this_res(Request $request){
        $restaurant = $request->restaurant;
        $total = $request->total;
        $data = Food::with('category','restaurant')->where('res_id',$restaurant)->orderBy('id','desc');
        return $data->paginate($total);
    }


}
