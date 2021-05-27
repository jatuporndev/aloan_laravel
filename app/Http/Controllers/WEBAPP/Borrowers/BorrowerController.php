<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
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
            'phone' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'IDCard' => ['required', 'string', 'max:13'],
            'IDCard_back' => ['required', 'string', 'max:10'],
            'bank' => ['required', 'string', 'max:13'],
            'IDBank' => ['required', 'string', 'max:10'],
            'salary' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:borrowers'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            
          ]);

          $borrower = new Borrowers();
          $borrower->firstname = $request->firstname;
          $borrower->lastname = $request->lastname;
          $borrower->address = $request->address;
          $borrower->gender = $request->gender;
          $borrower->married = $request->married;
          $borrower->birthday = $request->birthday;
          $borrower->phone = $request->phone;
          $borrower->job = $request->phone;
          $borrower->IDCard = $request->IDCard;
          $borrower->IDCard_back = $request->IDCard_back;
          $borrower->bank = $request->bank;
          $borrower->IDBank = $request->IDBank;
          $borrower->salary = $request->salary;
          $borrower->email = $request->email;
          $borrower->password = \Hash::make($request->password);
          $save = $borrower->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully as borrower');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:borrowers,email',
           'password'=>'required|min:5|max:30',
           
        ],[
            'email.exists'=>'This email is not exists in borrowers table'
        ]);

        
        if( Auth::guard('borrower')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'verify' => 0]) ){

            Auth::guard('borrower')->logout();
            return redirect('/multi')->with('fail1','Waiting For ADMIN Verify Your Account');
    

     }elseif( Auth::guard('borrower')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'verify' => 1])){
            return redirect()->route('borrower.home');

        }elseif( Auth::guard('borrower')->attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'verify' => 2])){
            Auth::guard('borrower')->logout();
            return redirect('/multi')->with('fail','Your Account Not Pass');
     }
        return redirect('/multi')->with('fail','Incorrect Credential');

    function logout(){
        Auth::guard('borrower')->logout();
        return redirect('/');
        }
    }
}
