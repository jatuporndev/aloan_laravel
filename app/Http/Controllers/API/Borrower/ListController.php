<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pined;
use DB;

class ListController extends Controller
{
    public function index(Request $request)
    {       
        $spinM= $request->get('money_max');
        $spinI = $request->get('interest');       
        $search = $request->get('search');

        $sql="SELECT *  FROM borrowlist 
        INNER JOIN loaners ON loaners.LoanerID  = borrowlist.LoanerID
        WHERE  borrowlist.status= '1' ";
        if($spinM!=""){
            $sql.=" AND borrowlist.money_max>=$spinM";      
        }
        if($spinI!=""){
            $sql.=" AND borrowlist.interest<=$spinI"; 
        }
        if($search!=""){
            $sql.="  AND loaners.Firstname LIKE '%$search%' 
            OR loaners.Lastname LIKE '%$search%' ";
        }
       
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function pined($borrowerID,$BorrowelistID)
    { 
        $sql="SELECT * FROM pined WHERE BorrowerID =$borrowerID AND borrowlistID =$BorrowelistID";
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }
    public function addpined(Request $request)
    { 
        $user = new Pined();
        $user->BorrowerID  = $request->get('BorrowerID');
        $user->borrowlistID  = $request->get('borrowlistID');
        $user->save();
        return response()->json(array(
        'message' => 'add a  successfully',
        'status' =>'true'));
    }

    public function delete($borrowerID,$BorrowelistID)
    { 
        $sql="DELETE FROM pined WHERE borrowerID=$borrowerID AND borrowlistID =$BorrowelistID";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

}
