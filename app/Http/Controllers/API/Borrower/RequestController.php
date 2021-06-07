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
        return response()->json(array(
        'message' => 'add a  successfully',
        'status' =>'true'));
    }
    //ใช้ดูทั้งหน้าแรก และดีเทล
    public function viewRequest(Request $request)
    { 
        $BorrowerID = $request->get('BorrowerID');
        $borrowlistID  = $request->get('borrowlistID');

        $sql="SELECT request.*,loaners.*  FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID =request.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID  =borrowlist.LoanerID 
        WHERE 1 ";
        if($borrowlistID!=""){
            $sql.=" AND (request.status = 0 OR request.status = 1 OR request.status = 2 OR request.status = 3 )"; 
            $sql.=" AND borrowlist.borrowlistID =$borrowlistID AND request.BorrowerID =$BorrowerID";   
        }if($BorrowerID!="" && $borrowlistID==""){
            $sql.=" AND request.status = 0 "; 
            $sql.=" AND request.BorrowerID =$BorrowerID ";      
        }
     
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function viewUnpass(Request $request)
    { 
        $BorrowerID = $request->get('BorrowerID');
        $borrowlistID  = $request->get('borrowlistID');

        $sql="SELECT request.*,loaners.*  FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID =request.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID  =borrowlist.LoanerID 
        WHERE 1  AND request.status = 4 OR request.status = 14 ";
        if($borrowlistID!=""){
            $sql.=" AND borrowlist.borrowlistID =$borrowlistID ";      
        }if($BorrowerID!=""){
            $sql.=" AND request.BorrowerID =$BorrowerID ";      
        }
     
        $recount=DB::select($sql);         
        return response()->json($recount);
    }
    public function viewConfirmed($BorrowerID){
        $sql="SELECT request.*,loaners.* FROM request 
        INNER JOIN borrowlist ON borrowlist.borrowlistID =request.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID  =borrowlist.LoanerID 
        WHERE 1 AND (request.status = 1 OR request.status = 11) 
        AND request.BorrowerID =$BorrowerID";
        
        $confirm=DB::select($sql);
        return response()->json($confirm);
    }

    public function viewConfirmedDetail($RequestID){
        $sql="SELECT request.*,loaners.* FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID =request.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID  =borrowlist.LoanerID 
        WHERE 1 AND request.RequestID = $RequestID";

        $confirm=DB::select($sql)[0];
        return response()->json($confirm);
    }

    public function updateUnpassChecked($id)
    {       
        $user = RequestM::find($id);
        $user->status = 14;      
        $user->save();
        return response()->json(array(
            'message' => 'update successfully', 
            'status' => 'true'));
    }
    public function updateAccept($id)
    {       
        $user = RequestM::find($id);
        $user->status = 2;      
        $user->save();
        return response()->json(array(
            'message' => 'update successfully', 
            'status' => 'true'));
    }


    public function delete($RequestID)
    { 
        $sql="DELETE FROM request WHERE RequestID=$RequestID";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function cancleRequest($BorrowerID)
    { 
        $sql="UPDATE request
        SET status = 5
        WHERE status = 1 AND BorrowerID =$BorrowerID ;";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }
    

    public function count($BorrowerID)
    { 
        $sql="SELECT DISTINCT  
                     (SELECT count(RequestID) FROM request WHERE status = 0 AND BorrowerID =$BorrowerID) as count_waiting,
                     (SELECT count(RequestID) FROM request WHERE status = 1 AND BorrowerID =$BorrowerID) as count_confirm,
                     (SELECT count(RequestID) FROM request WHERE status = 4 AND BorrowerID =$BorrowerID) as count_unpass,

                     (SELECT count(RequestID) FROM request,borrowlist WHERE request.borrowlistID =borrowlist.borrowlistID AND 
                     request.status = 0 AND borrowlist.LoanerID  =$BorrowerID) as count_request_loaner,
                     (SELECT count(RequestID) FROM request,borrowlist WHERE request.borrowlistID =borrowlist.borrowlistID AND
                     request.status = 2 AND borrowlist.LoanerID  =$BorrowerID) as count_pay_loaner
        FROM request " ;//บน Borrower = BorrowerID
                        //ล่าง Loaner = LoanerID
        $recount=DB::select($sql)[0];         
        
        return response()->json($recount);
    }
    
}