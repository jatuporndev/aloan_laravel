<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Borrowers;
use App\Models\History;
use App\Models\HistoryBill;
use Illuminate\Support\Facades\Auth;
use DB;

class Borrowdetailcontroller extends Controller
{
    public function index($borrowerID){

        $sql="SELECT borrowdetail.*,loaners.*,ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as perints,
        (SELECT settlement_date FROM history  WHERE BorrowDetailID = borrowdetail.BorrowDetailID AND status =0 LIMIT 1) as settlement_date FROM borrowdetail 
              INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
              INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
              WHERE 1 AND  BorrowerID = $borrowerID AND borrowdetail.status = 0";

        $data = DB::select($sql);

        return response()->json($data);
    }


    public function ManuPaydetail($BorrowDetailID){

        $sql="SELECT borrowdetail.*,loaners.*,(borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100))) as total FROM borrowdetail 
              INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
              INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
              WHERE 1 AND  BorrowDetailID = $BorrowDetailID";

        $data = DB::select($sql)[0];
        return response()->json($data);
    }

    public function ViewPaying($BorrowDetailID){
        date_default_timezone_set('Asia/Bangkok');
        $datenow = date('Y-m-d');
        $Date = date('Y-m-d');
        $Date = strtotime("+1 months", strtotime($Date));
        $Date = date('Y-m-d',$Date); 
        $sql="SELECT history.*, IF(settlement_date < '$datenow', '1', '0') as dateset_status,
         ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as moneySet,
         ROUND(( ((borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total*(borrowdetail.Interest_penalty/100)) ),2) as interest_penalty_money
        FROM history 
        INNER JOIN borrowdetail ON borrowdetail.BorrowDetailID = history.BorrowDetailID 
        WHERE history.BorrowDetailID =$BorrowDetailID ";
        $sql.=" AND  settlement_date <= '$Date' AND history.status = 0 ";
        $data = DB::select($sql);

        return response()->json($data);
    }

    public function createHis($BorrowDetailID,$moneytotal,Request $request){

        date_default_timezone_set('Asia/Bangkok');
        $data = new HistoryBill();
        $data-> datepaying = date('Y-m-d');  
        $data-> money =$request->get('money');
        $data-> BorrowDetailID = $BorrowDetailID; 
        $data-> money_total = $moneytotal; 

        $file = $request->file('imageBill');
        if(isset($file)){
            $file->move('assets/uploadfile/Borrower/payment',$file->getClientOriginalName());
            $data->imageBill = $file->getClientOriginalName();
        } 
        $data->save();
        return response()->json(array(
            'message' => 'update a  successfully', 
            'status' => 'true'));

    }
    
    public function update($historyID){//loop in android

        $sql="SELECT `historyDetailID` FROM `historydetailbill` WHERE 1 ORDER by `historyDetailID` DESC";
        $datahis = DB::select($sql)[0];

        date_default_timezone_set('Asia/Bangkok');
        $data = History::find($historyID);
        $data-> date_pay = date('Y-m-d');
        $data->historyDetailID = $datahis->historyDetailID;   
        $data->status = 1;      
        $data->save();


        return response()->json(array(
            'message' => 'update a History successfully', 
            'status' => 'true'));

    }
}