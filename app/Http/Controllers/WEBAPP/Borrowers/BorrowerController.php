<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use Illuminate\Support\Facades\Auth;
use DB;

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
            'phone' => ['required', 'string', 'max:10'],
            'job' => ['required', 'string', 'max:255'],
            'IDCard' => ['required', 'string', 'max:13'],
            'IDCard_back' => ['required', 'string', 'max:10'],
            'bank' => ['required', 'string', 'max:13'],
            'IDBank' => ['required', 'string', 'max:10'],
            'salary' => ['required', 'integer'],
            'image_IDCard' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            // 'image_face' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:borrowers'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            
          ]);

           $image_IDCard = $request->file('image_IDCard');
           $new_name = rand() . '.' . $image_IDCard->getClientOriginalExtension();
           $image_IDCard->move(public_path('assets/uploadfile/Borrower/cardimage'), $image_IDCard->getClientOriginalName());
           $imageFileName = $image_IDCard->getClientOriginalName();

           $image_face = $request->file('image_face');
           $new_name = rand() . '.' . $image_face->getClientOriginalExtension();
           $image_face->move(public_path('assets/uploadfile/Borrower/imageVetify'), $image_face->getClientOriginalName());
           $imageFileName2 = $image_face->getClientOriginalName();

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
          $borrower->image_IDCard = $imageFileName;
          $borrower->image_face = $imageFileName2;
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

    }

    function logout(){
        Auth::guard('borrower')->logout();
        return redirect('/');
        }
}
