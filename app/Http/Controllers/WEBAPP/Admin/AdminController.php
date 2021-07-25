<?php

namespace App\Http\Controllers\WEBAPP\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminController extends Controller
{
    function create(Request $request){
        //* Validate Input
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required' ],
            'address' => ['required'],
            'phone' => ['required' ],
            'email' => ['required' ],
            'password' => ['required'],
            
        ]);

        $admin = new Admin();
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->address = $request->address;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->password = \Hash::make($request->password);
        $save = $admin->save();

        if( $save ){
            return redirect()->back()->with('success','congrate');
        }else{
            return redirect()->back()->with('fail','cried');
        }

    }

    function check(Request $request){
        //*Validate inputs
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'This email is not exists on admins table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('admins')->attempt($creds) ){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('admins')->logout();
        return redirect('/');
    }

    function profile(){
        
        return view('dashboard.admin.profile');
    }

    function updateInfo(Request $request){

        
        $validator = \Validator::make($request->all(),[
            'email'=> 'required|email',
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'address'=>'required',
           

        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            
            $query = Admin::find(Auth::guard('admins')->user()->id)->update([
                  'email'=>$request->email,
                  'firstname'=>$request->firstname,
                  'lastname'=>$request->lastname,        
                  'phone'=>$request->phone,      
                  'address'=>$request->address,        
                
             ]);

            if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'อัปเดตข้อมูลสำเร็จ']);
             }
        
        }
     } 
}

