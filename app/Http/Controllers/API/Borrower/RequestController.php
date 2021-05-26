<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestM;
use DB;

class RequestController extends Controller
{
    public function addRequest(Request $request)
    { 
        $re = new RequestM();
        $re->Money  = $request->get('Money');
        $re->instullment  = $request->get('instullment');
        $re->Interest  = $request->get('Interest');
        $re->Interest_penalty  = $request->get('Interest_penalty');
        $re->status = 0;
        $re->dateRe =  date('Y-m-d');
        $re->BorrowerID = $request->get('BorrowerID');
        $re->borrowlistID = $request->get('borrowlistID');
        $re->save();
        return response()->json(array(
        'message' => 'add a  successfully',
        'status' =>'true'));
    }
    public function viewRequest(Request $request)
    { 
        $BorrowerID = $request->get('BorrowerID');
        $borrowlistID  = $request->get('borrowlistID');

        $sql="SELECT request.*,loaners.*  FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID =request.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID  =borrowlist.LoanerID 
        WHERE 1 ";
        if($borrowlistID!=""){
            $sql.=" AND borrowlist.borrowlistID =$borrowlistID ";      
        }if($BorrowerID!=""){
            $sql.=" AND request.BorrowerID =$BorrowerID ";      
        }
     
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function delete($RequestID)
    { 
        $sql="DELETE FROM request WHERE RequestID=$RequestID";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function count($BorrowerID)
    { 
        $sql="SELECT DISTINCT  
                     (SELECT count(RequestID) FROM request WHERE status = 0 AND BorrowerID =$BorrowerID) as count_waiting,
                     (SELECT count(RequestID) FROM request WHERE status = 1 AND BorrowerID =$BorrowerID) as count_confirm,

                     (SELECT count(RequestID) FROM request,borrowlist WHERE request.borrowlistID =borrowlist.borrowlistID AND 
                     request.status = 0 AND borrowlist.LoanerID  =$BorrowerID) as count_request_loaner,
                     (SELECT count(RequestID) FROM request,borrowlist WHERE request.borrowlistID =borrowlist.borrowlistID AND 
                     request.status = 2 AND borrowlist.LoanerID  =$BorrowerID) as count_pay_loaner
        FROM request " ;
        $recount=DB::select($sql)[0];         
        
        return response()->json($recount);
    }
    
}