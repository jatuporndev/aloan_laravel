<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaners;
use Illuminate\Support\Facades\Auth;
use DB;

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
          'image_IDCard' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
          'image' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
          'email' => ['required', 'string', 'email', 'max:255', 'unique:loaners'],
          'password' => ['required', 'string', 'min:5', 'confirmed'],
          
        ]);
        
        // เข้ารหัสรูปภาพ
         //$image_IDCard = $request->file('image_IDCard');
         //Generate ชื่อภาพ
         //$name_gen = hexdec(uniqid());
         //ดึงนามสกุลไฟล์ภาพ
         //$img_ext = strtolower($image_IDCard->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
         //อัปโหลดและบันทึกข้อมูล
         //$upload_location = 'assets/uploadfile/Loaner/cardimage/';
         //$full_path = $upload_location.$img_name;

         $image_IDCard = $request->file('image_IDCard');
         $new_name = rand() . '.' . $image_IDCard->getClientOriginalExtension();
         $image_IDCard->move(public_path('assets/uploadfile/Loaner/cardimage'), $image_IDCard->getClientOriginalName());
         $imageFileName = $image_IDCard->getClientOriginalName();

         $image = $request->file('image');
         $new_name = rand() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('assets/uploadfile/Loaner/imageVetify'), $image->getClientOriginalName());
         $imageFileName2 = $image->getClientOriginalName();


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
         $loaner->image_IDCard = $imageFileName;
         $loaner->image = $imageFileName2;
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
    

    }

    function logout(){
        Auth::guard('loaner')->logout();
        return redirect('/');
        }
        
    public function setborrowlist($id)
        {       
            $user = Loaners::find($id);
            $user->setborrowlist = 1;            
            $user->save();

            $sql="SELECT *  FROM borrowlist WHERE LoanerID = $id" ;
            $databorrowlist=DB::select($sql)[0];
    
            return redirect('loaner/insertCri/'.$databorrowlist -> borrowlistID);
    }
   

}
