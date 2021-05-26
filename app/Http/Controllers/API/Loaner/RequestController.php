<?php
namespace App\Http\Controllers\API\Loaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestM;
use DB;

class RequestController extends Controller
{
    public function request($LoanerID)
    { 
        $sql="SELECT * FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID = request.borrowlistID
        INNER JOIN borrowers ON request.BorrowerID  = borrowers.BorrowerID 
        WHERE borrowlist.LoanerID = $LoanerID " ;
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

}