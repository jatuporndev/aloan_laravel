<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Borrowers;
use Illuminate\Support\Facades\Auth;
use DB;

class Borrowdetailcontroller extends Controller
{
    public function index($borrowerID){

        $sql="SELECT borrowdetail.*,loaners.* FROM borrowdetail 
              INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
              INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
              WHERE 1 AND  BorrowerID = $borrowerID";

        $data = DB::select($sql);

        return response()->json($data);
    }

    public function ManuPaydetail($BorrowDetailID){

        $sql="SELECT borrowdetail.*,loaners.* FROM borrowdetail 
              INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
              INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
              WHERE 1 AND  BorrowDetailID = $BorrowDetailID";

        $data = DB::select($sql)[0];
        return response()->json($data);
    }

    public function ViewPaying($BorrowDetailID){

       // $sql="SELECT history.* FROM history
      // INNER JOIN borrowdetail ON borrowdetail.BorrowDetailID = history.BorrowDetailID 
      //  WHERE 1 AND history.BorrowDetailID =$BorrowDetailID ";
        date_default_timezone_set('Asia/Bangkok');
        $datenow = date('Y-m-d');
        $Date = date('Y-m-d');
        $Date = strtotime("+1 months", strtotime($Date));
        $Date = date('Y-m-d',$Date);
        $sql="SELECT history.*, IF(settlement_date < '$datenow', '1', '0') as dateset_status,
        (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total as moneySet,
        ((borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total*(borrowdetail.Interest_penalty/100)) as interest_penalty_money
        FROM history 
        INNER JOIN borrowdetail ON borrowdetail.BorrowDetailID = history.BorrowDetailID 
        WHERE history.BorrowDetailID =$BorrowDetailID ";
        $sql.=" AND  settlement_date <= '$Date' AND history.status = 0 ";
        $data = DB::select($sql);

        return response()->json($data);
    }
}