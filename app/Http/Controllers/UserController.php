<?php

namespace App\Http\Controllers; // namespace before use App\user must

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    //
    public function registration(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:users',
            'address'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'password'=>'required|string|min:6|confirmed',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        
        return response()->json([
            'user' => $user,
               'success' => true
           ],200);

        // return redirect('/login');
       
    }

    public function login(Request $request){

        if((User::where('email', $request->email)->count())==0){
            return redirect("/login")->with('message',"Email Doesn't exist!");
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
           $user = Auth::user();

           if($user->user_type == 'User'){
               $storeUrl= url()->previous();
                \Log::info($storeUrl);
                //$returnurl
                //return redirect($returnurl);
                return redirect("/");
            }
            if($user->user_type == 'Admin'){
                return redirect("/admin");
            }

            if($user->user_type == 'Restaurant' && $user->request_status == 'Approved'){
                return redirect("/restaurantProfile");
            }

            if($user->user_type == 'Restaurant' && $user->request_status == 'Pending'){
                Auth::logout();
                Session::flush();
                Auth::check();
                return redirect("/login")->with('message',"You Need Admin Approval!");
            }

            else{
                return  redirect("/login")->with('message',"Your Need Authorithies Permission!");
            }

         }

         else{
            return  redirect("/login")->with('message',"Incorrect Password!");
         }

    }

    public function all_user(){
        return User::all();
    }

    public function restaurant_user(Request $request){
        $total = $request->res_id;
        return User::with('avgreview','city')->where('id',$total)->get();
    }
    // public function changeIt(Request $request){
    //     $data = $request->all();
        
    //     if($data['request_status']=='approve') $data['request_status'] = 'Pending';
    //     if($data['request_status']=='pending') $data['request_status'] = 'Approved';

    //     return User::where('id',$data['id'])->update($data);
    // }

    public function updateUser(Request $request){
        $data = $request->all();
        \Log::info($data);
        return User::where('id',$data['id'])->update($data);
    }

    public function deleteUser(Request $request){
        $data = $request->all();
        return User::where('id',$data['id'])->delete();
    }


    public function login_check(){
         //$storeUrl= url()->previous();
        if(Auth::check()==false){
            
            return view('login');
        }
        else{
            return  redirect("/");
            //return redirect()->back();
        }
        
    }

    public function changePassword(Request $request){
        $data = $request->all();
        $user = Auth::user();
       
        if(!Hash::check($request->current_password, $user->password)){
            return response()->json([
                'msg' => 'Old password is not correct.',
                'success' => false
            ],401);
        }

        $this->validate($request,[
        
            'new_password'=>'required|string|min:6'
        ]
        );

        $password = Hash::make($data['new_password']);
    
        $user = User::where('id', $user->id)->update(['password' => $password]);
        return response()->json([
        'user' => $user,
        'success' => true
        ],200);
    }




    public function getDataBySearch(Request $request){
        $location = $request->location;
        $query = User::where('user_type','Restaurant')
                ->where('request_status','Approved')
                ->with('avgreview','city');

        if($location){
            $query->where('address','like', '%'.$location.'%');
        }
        
        // if($location){
        //     $query->whereHas('city.area', function($q) use ($location) { 

        //         $q->where('name','like', '%'.$location.'%'); });
        // }
        if(!$location){
            return;
        }


        $data = $query->get();
        return $data;
        // return User::all();
    }
    public function all_user_pagi(Request $request){
        $total = $request->total;
        $data = User::orderBy('id','desc');
        return $data->paginate($total);
    }

    public function total_user(Request $request){
        $total = $request->total;
        $data = User::where('user_type','User')->orderBy('id','desc');
        return $data->paginate($total);
    }
    
}
