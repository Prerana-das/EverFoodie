<?php

namespace App\Http\Controllers; // namespace before use App\user must

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        User::create($data);
        
       // $user = User;
        // return response()->json([
        //     'user' => $user,
        //        'success' => true
        //    ],200);

        return redirect('/login');
       
    }

    public function login(Request $request){
        if((User::where('email', $request->email)->count())==0){
            return response()->json([
                'msg' => "Email doesn't exist!",
            ],422);
        }

         if((User::where('email', $request->email)->count())==0){
            return redirect("/login")->with('message',"Incorrect Email!");
        }
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
           $user = Auth::user();
           if($user->user_type == 'User'){
                    return redirect("/");
            }
            if($user->user_type == 'Admin'){
                return redirect("/admin");
            }


         }

         if (Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
            
            $user = Auth::user();
            \Log::info($user);
              if($user->user_type == 'Restaurant' && $user->request_status == 'Approved'){
                 return redirect("/");
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





    

}
