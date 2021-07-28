<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowDetail;
use App\Models\RequestM;
use App\Models\History;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use DB;

class LoanerHistoryController extends Controller
{
    public function confrim($historyDetailID){
        date_default_timezone_set('Asia/Bangkok');
        $sql="UPDATE history
        SET status = 2
        WHERE historyDetailID = $historyDetailID";
        $data = DB::select($sql);

        $sql="UPDATE historydetailbill
        SET status = 1
        WHERE historyDetailID = $historyDetailID";
        $data = DB::select($sql);

        $sql="SELECT historydetailbill.*, borrowdetail.*,request.requestID,borrowdetail.borrowdetailID FROM historydetailbill
        INNER JOIN borrowdetail ON historydetailbill.borrowdetailID = borrowdetail.borrowdetailID
        INNER JOIN request ON request.requestID = borrowdetail.requestID
         WHERE historydetailbill.historyDetailID  = $historyDetailID";
        $dataDetail = DB::select($sql)[0];

        $sql="SELECT COUNT(historyID) as count FROM history WHERE historyDetailID = $historyDetailID";
        $count_instullment = DB::Select($sql)[0];

        $datenow = date('Y-m-d');

        $sql="UPDATE borrowdetail
        SET instullment_Amount = $dataDetail->instullment_Amount-$count_instullment->count,
        remain = $dataDetail->remain - $dataDetail->money,
        Update_date = '$datenow'

        WHERE borrowdetailID = $dataDetail->BorrowDetailID";
        $data = DB::select($sql);

        
        $sqlborrowdetail ="SELECT * FROM borrowdetail WHERE borrowdetailID = $dataDetail->BorrowDetailID";
        $dataBorrowdetail = DB::select($sqlborrowdetail)[0];

        if($dataBorrowdetail->instullment_Amount == '0'){
            $sql="UPDATE borrowdetail
            SET status = 1
            WHERE borrowdetailID = $dataBorrowdetail->BorrowDetailID";
            $data = DB::select($sql);

            $sql="UPDATE request
            SET status = 6
            WHERE RequestID = $dataBorrowdetail->RequestID";
            $data = DB::select($sql);
        }

        return redirect()->route('loaner.menu3')->with('success','ยืนยันใบเสร็จชำระเงิน');

    }

    public function cancle($historyDetailID){
        date_default_timezone_set('Asia/Bangkok');
        $sql="UPDATE history
        SET status = 0,historyDetailID = NULL
        WHERE historyDetailID = $historyDetailID";
        $data = DB::select($sql);

        $sql="UPDATE historydetailbill
        SET status = 2
        WHERE historyDetailID = $historyDetailID";
        $data = DB::select($sql);

        return redirect()->route('loaner.menu3')->with('success','ยกเลิกใบเสร็จชำระเงิน');
    }

}