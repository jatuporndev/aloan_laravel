<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pined;
use DB;

class PinedController extends Controller
{
    public function index($id)
    {       
        $sql="SELECT *  FROM pined 
        INNER JOIN borrowlist ON pined.borrowlistID = borrowlist.borrowlistID
        INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
        WHERE pined.BorrowerID = $id";
    
       
        $pin=DB::select($sql);         
        return response()->json($pin);
    }
}