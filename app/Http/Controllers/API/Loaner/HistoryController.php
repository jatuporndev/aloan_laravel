<?php
namespace App\Http\Controllers\API\Loaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowDetail;
use App\Models\RequestM;
use App\Models\History;
use Illuminate\Support\Facades\Mail;
use DB;

class HistoryController extends Controller
{
    public function billDetail($historyDetailID)
    { 
        $sql="SELECT *,ROUND((money_total - money),2) as fire FROM historydetailbill WHERE historyDetailID = $historyDetailID";

        $data = DB::Select($sql)[0];

        return response()->json($data);

    }
    public function history($historyDetailID)
    { 
        $sql="SELECT * FROM historydetailbill WHERE historyDetailID = $historyDetailID";
        $data1 = DB::Select($sql)[0];

        date_default_timezone_set('Asia/Bangkok');
        $datenow = date($data1->datepaying);
        $sql="SELECT history.*, IF(settlement_date < '$datenow', '1', '0') as dateset_status,
       ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as moneySet,
         ROUND(( ((borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total*(borrowdetail.Interest_penalty/100)) ),2) as interest_penalty_money
        FROM history 
        INNER JOIN borrowdetail ON borrowdetail.BorrowDetailID = history.BorrowDetailID 
        WHERE  history.historyDetailID = $historyDetailID ";
        $data = DB::select($sql);

        return response()->json($data);

    }

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

        return response()->json($dataDetail);

    }

    public function AllSuccess($loanerID){
        
        $sql="SELECT borrowers.*,borrowdetail.* FROM borrowdetail 
        INNER JOIN borrowlist ON borrowlist.borrowlistID = borrowdetail.borrowlistID
        INNER JOIN borrowers ON borrowers.BorrowerID =borrowdetail.BorrowerID
        WHERE borrowlist.loanerID = $loanerID AND borrowdetail.status = 1";
        $data = DB::select($sql);
        return response()->json($data);

    }

    public function indexHistory($borrowerID){
        $sql="SELECT loaners.*,borrowdetail.* FROM borrowdetail 
        INNER JOIN borrowlist ON borrowlist.borrowlistID = borrowdetail.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID =borrowlist.LoanerID
        WHERE borrowdetail.BorrowerID = $borrowerID ";
        $data = DB::select($sql);
        return response()->json($data);
    }

    
}