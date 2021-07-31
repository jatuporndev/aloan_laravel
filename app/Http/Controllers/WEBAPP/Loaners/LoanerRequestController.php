<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaners;
use App\Models\Bank;
use App\Models\RequestM;
use Illuminate\Support\Facades\Auth;
use DB;

class LoanerRequestController extends Controller
{
    public function request()
    {     
        return view('dashboard.loaner.menu');
    }

    public function ViewBorrowerRequest($requestID)
    { 
        $sql="SELECT * FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID = request.borrowlistID
        INNER JOIN borrowers ON request.BorrowerID  = borrowers.BorrowerID 
        WHERE request.RequestID= $requestID " ;
        $post=DB::select($sql)[0];      
           
        return view('dashboard.loaner.menu1Detail', ['view'=> $post]);
    }

    
    public function updatePass($id,Request $request)
    {       
        $loanerID = Auth::guard('loaner')->user()->LoanerID; 
        $sql="SELECT * FROM borrowlist WHERE LoanerID = $loanerID";
        $data= DB::select($sql)[0];

        if($request->get('money_confirm') > $data-> money_max || $request->get('instullment_confirm') > $data-> instullment_max	){

            return redirect()->back()->with('fail','เกินจากจำนวนที่ตั้งไว้');
        }

        date_default_timezone_set('Asia/Bangkok');
        $user = RequestM::find($id);
        $user->status = 1;     
        $user->dateCheck = date('Y-m-d');  
        $user->money_confirm = $request->get('money_confirm');  
        $user->instullment_confirm = $request->get('instullment_confirm');     
        $user->save();

       
        return redirect()->route('loaner.menu')->with('success','อนุมัติคำขอสำเร็จ');
    }

    public function updateUnpass($id,Request $request)
    {       
        date_default_timezone_set('Asia/Bangkok');
        $user = RequestM::find($id);
        $user->status = 4;     
        $user->dateCheck = date('Y-m-d');     
        if($request->get('comment') =="" ){
        $user->comment = "ไม่ได้ระบุ.";
        }else{
        $user->comment = $request->get('comment');  
        }
        
        $user->save();
        return redirect()->route('loaner.menu')->with('success','ยกเลิกคำขอสำเร็จ');
    }

    public function ViewBorrowerRequest2($requestID)
    { 
        $sql="SELECT * FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID = request.borrowlistID
        INNER JOIN borrowers ON request.BorrowerID  = borrowers.BorrowerID 
        WHERE request.RequestID= $requestID " ;
        $post=DB::select($sql)[0];      
           
        return view('dashboard.loaner.menu2Detail', ['view'=> $post]);
    }
}