<?php
namespace App\Http\Controllers\API\Loaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowlist;
use DB;

class BorrowerlistController extends Controller
{
    public function index($id)
    { 
        $sql="SELECT *  FROM borrowlist 
        INNER JOIN loaners ON loaners.LoanerID  = borrowlist.LoanerID 
        WHERE loaners.LoanerID=$id";
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    } 
    public function create($id)
    {
        //add user data into users table
        $borrowerlist = new Borrowlist();
        $borrowerlist->	money_min = 0;
        $borrowerlist->money_max = 15000;        
        $borrowerlist->	interest = 5;
        $borrowerlist->	Interest_penalty = 5;
        $borrowerlist->	LoanerID = $id;
         
        $borrowerlist->save();                
        return response()->json(array(
            'message' => 'add a borrowerlist successfully', 
            'status' => 'true'));  
    }
    public function update(Request $request,$id)
    {       
        $borrowerlist =Borrowlist::where('LoanerID', '=', $id)->firstOrFail();
        $borrowerlist->money_min = $request->get('money_min');
        $borrowerlist->money_max = $request->get('money_max');        
        $borrowerlist->interest = $request->get('interest');    
        $borrowerlist->Interest_penalty = $request->get('Interest_penalty');   
        $borrowerlist->instullment_max = $request->get('instullment_max');   
        $borrowerlist->save();

        $moneyMax=$request->get('money_max');
        $cri="UPDATE criterion SET money_max = $moneyMax,instullment_max= $borrowerlist->instullment_max
        WHERE borrowlistID =$borrowerlist->borrowlistID AND money_max > $borrowerlist->money_max OR instullment_max > $borrowerlist->instullment_max";
        DB::select($cri);

        return response()->json(array(
            'message' => 'update a user successfully', 
            'status' => 'true'));
    }
    public function setpublic($id,$status)
    {       
        $sql="UPDATE borrowlist SET status = $status WHERE LoanerID=$id";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }
}