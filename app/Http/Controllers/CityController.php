<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
class CityController extends Controller
{
    //

    public function allCity(){
        return City::all();
    }

    public function storeCity(Request $request){
        $data = $request->all();
        return City::create($data);
    }


    // public function upload(Request $request)
    // {
    //    \Log::info($request->all());
        
    //     request()->file('image')->store('uploads');
    //     $pic= $request->image->hashName();
    //     $pic= "/uploads/$pic";
    //     /*update the profile pic*/
    //     //return Gallery::create($data);
    //     return response()->json([
    //         'imageUrl'=> $pic
    //     ],200);
    // }

    public function upload(Request $request)
    {
        \Log::info($request);
        request()->file('image')->store('/uploads');
        $pic = "/uploads/" . $request->image->hashName();
        return $pic;
    }


    public function updateCity(Request $request){
        $data = $request->all();
        \Log::info($data);
        return City::where('id',$data['id'])->update($data);
    }


    public function getUserImage(Request $request){
        request()->file('image')->store('uploads');
        $pic= "/uploads/".$request->image->hashName();
        $data =[
           'image' => $pic,
        ];
        City::where('id',$id)->update($data);
        return $pic;
        
    }
    
    public function deleteCity(Request $request){
        $data = $request->all();
        return City::where('id',$data['id'])->delete();
    }


}
