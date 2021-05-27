<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaners;
use Illuminate\Support\Facades\Auth;

class LoanerController extends Controller
{

    function create(Request $request){
        //Validate inputs
        $request->validate([
          'firstname' => ['required', 'string', 'max:255'],
          'lastname' => ['required', 'string', 'max:255'],
          'address' => ['required', 'string', 'max:255'],
          'gender' => ['required', 'string'],
          'married' => ['required', 'string'],
          'birthday' => ['required', 'date'],
          'phone' => ['required', 'string', 'max:10'],
          'job' => ['required', 'string', 'max:255'],
          'IDCard' => ['required', 'string', 'max:13'],
          'IDCard_back' => ['required', 'string', 'max:10'],
          'bank' => ['required', 'string', 'max:13'],
          'IDBank' => ['required', 'string', 'max:10'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:loaners'],
          'password' => ['required', 'string', 'min:5', 'confirmed'],
          
        ]);

        $loaner = new Loaners();
        $loaner->firstname = $request->firstname;
        $loaner->lastname = $request->lastname;
        $loaner->address = $request->address;
        $loaner->gender = $request->gender;
        $loaner->married = $request->married;
        $loaner->birthday = $request->birthday;
        $loaner->phone = $request->phone;
        $loaner->job = $request->phone;
        $loaner->IDCard = $request->IDCard;
        $loaner->IDCard_back = $request->IDCard_back;
        $loaner->bank = $request->bank;
        $loaner->IDBank = $request->IDBank;
        $loaner->email = $request->email;
        $loaner->password = \Hash::make($request->password);
        $save = $loaner->save();

        if( $save ){
            return redirect()->back()->with('success','You are now registered successfully as loaner');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
  }
    
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:loaners,email',
            'password'=>'required|min:5|max:30',
            
         ],[
             'email.exists'=>'This email is not exists in loaners table'
         ]);

         
         if( Auth::guard('loaner')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'verify' => 0]) ){

                Auth::guard('loaner')->logout();
                return redirect('/multi')->with('fail','Waiting For ADMIN Verify Your Account');
        

         }elseif( Auth::guard('loaner')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'verify' => 1])){
                return redirect()->route('loaner.home');

            }elseif( Auth::guard('loaner')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'verify' => 2])){
                Auth::guard('loaner')->logout();
                return redirect('/multi')->with('fail','Your Account Not Pass');
         }
            return redirect('/multi')->with('fail','Incorrect Credential');
    

    function logout(){
        Auth::guard('loaner')->logout();
        return redirect('/');
        }

    }
}
