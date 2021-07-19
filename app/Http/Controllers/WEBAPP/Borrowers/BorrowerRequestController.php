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
    public function addRequest(Request $request)
    { 
        date_default_timezone_set('Asia/Bangkok');
        $re = new RequestM();
        $re->Money  = $request->get('Money');
        $re->instullment_request  = $request->get('instullment');
        $re->Interest_request  = $request->get('Interest');
        $re->Interest_penalty_request  = $request->get('Interest_penalty');
        $re->status = 0;
        $re->dateRe =  date('Y-m-d');
        $re->BorrowerID = $request->get('BorrowerID');
        $re->borrowlistID = $request->get('borrowlistID');
        $re->save();


        return redirect()->route('borrower.home')->with('success','บันทึกข้อมูลสำเร็จ');
    }
}