<?php
namespace App\Http\Controllers\API\Loaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use DB;

class BankController extends Controller
{
    public function create(Request $request, $LoanerID){
         //add user data into users table
         $bankData = new Bank();
         $bankData ->bank = $request->get('bank');
         $bankData ->holderName = $request->get('holderName');      
         $bankData ->bankNumber = $request->get('bankNumber');
         $bankData ->LoanerID  = $LoanerID; 
 
         $bankData ->save();  

         return response()->json(array(
             'message' => 'add a bank successfully', 
             'status' => 'true'));  
    }

    public function index($LoanerID)
    { 
        $sql="SELECT * FROM loaner_bank WHERE LoanerID =$LoanerID";
         
        $recount=DB::select($sql);         
        return response()->json($recount);
    }
     public function delete($bankID)
    { 
        $sql="DELETE FROM loaner_bank WHERE bankID=$bankID";
        $recount=DB::select($sql);         
        return response()->json($recount);
    }
}