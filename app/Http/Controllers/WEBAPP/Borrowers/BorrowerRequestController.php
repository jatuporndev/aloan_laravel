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
        
        $sql=" SELECT IFNULL((SELECT 'True' FROM request WHERE borrowlistID = $borrowlistID AND BorrowerID = $borrowerID LIMIT 1), 'False') as check2";
        $data = DB::select($sql)[0];
        
     
        if($request->get('Money') > $request->get('money_max') || $request->get('instullment') > $request->get('instullment_max') ){

            return redirect()->back()->with('fail','ไม่สำเร็จ');;    //ถ้าเงินที่ขอหรืองวดที่ขอ เกินเกณฑ์
        }else{
            if($data->check2 =='True'){
                return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ');; //ถ้ามีคำขออยู่แล้ว
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

        return redirect()->route('borrower.home'); //ผ่าน

            }

        }
    }
}