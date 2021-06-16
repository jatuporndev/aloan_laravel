<?php
namespace App\Http\Controllers\API\Loaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use DB;

class BankController extends Controller
{
    public function View($bankname)
    { 
        $sql="SELECT * FROM banklist 
        WHERE bankname ='$bankname'";
         
        $recount=DB::select($sql)[0];         
        return response()->json($recount);
    }

    public function create(Request $request, $LoanerID){
         //add user data into users table
         $banklistID=$request->get('bank');    

         $sql="SELECT *  FROM banklist WHERE bankname = '$banklistID'" ;
         $databank=DB::select($sql)[0];

         $bankData = new Bank();
         $bankData ->bank = $request->get('bank');
         $bankData ->holderName = $request->get('holderName');      
         $bankData ->bankNumber = $request->get('bankNumber');
         $bankData ->LoanerID  = $LoanerID; 
         $bankData ->banklistID = $databank ->banklistID; 
 
         $bankData ->save();  

         return response()->json(array(
             'message' => 'add a bank successfully', 
             'status' => 'true'));  
    }

    public function index($LoanerID)
    { 
        $sql="SELECT * FROM loaner_bank 
        INNER JOIN banklist ON loaner_bank.banklistID = banklist.banklistID
        WHERE LoanerID =$LoanerID";
         
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

     public function delete($bankID)
    { 
        $sql="DELETE FROM loaner_bank WHERE bankID=$bankID";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }
    public function indexbank()
    { 
        $sql="SELECT * FROM banklist";
         
        $recount=DB::select($sql);         
        return response()->json($recount);
    }

    public function Viewbank($banklistID)
    { 
        $sql="SELECT * FROM banklist WHERE banklistID =$banklistID";
         
        $recount=DB::select($sql);         
        return response()->json($recount);
    }
}