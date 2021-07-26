<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use App\Models\RequestM;
use App\Models\Pined;
use DB;

class BorrowerRequestController extends Controller
{
    public function addRequest(Request $request,$borrowlistID)
    {   $borrowerID = \Auth::guard('borrower')->user()->BorrowerID;

        if($request->get('Money') =="" || $request->get('instullment') == ""){
            return redirect()->back()->with('fail','โปรดใส่คำขอ');
        }
        
        $sql=" SELECT IFNULL((SELECT 'True' FROM request WHERE borrowlistID = $borrowlistID AND BorrowerID = $borrowerID AND (request.status = 0 OR request.status = 1 OR request.status = 2 OR request.status = 3 ) LIMIT 1), 'False') as check2";
        $data = DB::select($sql)[0];
        
     
        if($request->get('Money') > $request->get('money_max') || $request->get('instullment') > $request->get('instullment_max') ){

            return redirect()->back()->with('fail','คำขอไม่ตรงเงื่อนไข');    //ถ้าเงินที่ขอหรืองวดที่ขอ เกินเกณฑ์
        }else{
            if($data->check2 =='True'){
                return redirect()->back()->with('fail1','มีคำขออยู่แล้ว'); //ถ้ามีคำขออยู่แล้ว
            }else{

        date_default_timezone_set('Asia/Bangkok');
        $re = new RequestM();
        $re->Money  = $request->get('Money');
        $re->instullment_request  = $request->get('instullment');
        $re->Interest_request  = $request->get('Interest');
        $re->Interest_penalty_request  = $request->get('Interest_penalty');
        $re->status = 0;
        $re->dateRe =  date('Y-m-d');
        $re->BorrowerID = \Auth::guard('borrower')->user()->BorrowerID;
        $re->borrowlistID = $borrowlistID;
        $re->save();

        return redirect()->route('borrower.menu1')->with('success','ส่งคำขอสำเร็จ'); //ผ่าน

            }

        }
    }

    public function updateUnpass($id)
    {       
        date_default_timezone_set('Asia/Bangkok');
        $user = RequestM::find($id);
        $user->status = 4;     
        $user->dateCheck = date('Y-m-d');     
      
        $user->comment = "ยกเลิก"; 
        
        
        $user->save();

        return redirect()->route('borrower.home');
    }


    public function viewConfirmedDetail($RequestID){
        $sql="SELECT request.*,loaners.* FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID =request.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID  =borrowlist.LoanerID 
        WHERE 1 AND request.RequestID = $RequestID";

        $post=DB::select($sql)[0];
        return view('dashboard.borrower.menu2Detail', ['view'=> $post]);
    }

    public function updateAccept($id)
    {          
        $sql="SELECT * FROM request WHERE requestID = $id";
        $data = DB::select($sql)[0];
     

        if (isset($_POST['Accept'])) {
            date_default_timezone_set('Asia/Bangkok');
            $user = RequestM::find($id);
            $user->dateAccept =  date('Y-m-d');
            $user->status = 2;      
            $user->save();

            $dateCheck =date('Y-m-d');
            $sql="UPDATE request
            SET status = 4 , comment = 'ยกเลิก', dateCheck =  '$dateCheck'
            WHERE (status = 1 OR status = 0 )AND BorrowerID =$data->BorrowerID ;";
            $recount=DB::select($sql);    

            return redirect()->route('borrower.menu1')->with('success','สำเร็จ');
            
        } else if (isset($_POST['UnAccept'])) {

            date_default_timezone_set('Asia/Bangkok');
            $user = RequestM::find($id);
            $user->status = 4;     
            $user->dateCheck = date('Y-m-d');     
            $user->comment = "ยกเลิก";
            $user->save();


            return redirect()->route('borrower.home')->with('success','ยกเลิกแล้ว');
        } 

    }

    



}