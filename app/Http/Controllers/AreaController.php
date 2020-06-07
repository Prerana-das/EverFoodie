<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    //
    public function allArea(){
       return Area::with('city')->get();
        // return Area::all();
    }

    public function all_area_list(Request $request){
        $total = $request->total;
        $data = Area::with('city')->orderBy('id','desc');
        return $data->paginate($total);
    }

    public function storeArea(Request $request){
        $data = $request->all();
        return Area::create($data);
    }
    public function updateArea(Request $request){
        $data = $request->all();
        \Log::info($data);
        return Area::where('id',$data['id'])->update($data);
    }
    public function deleteArea(Request $request){
        $data = $request->all();
        return Area::where('id',$data['id'])->delete();
    }

}
