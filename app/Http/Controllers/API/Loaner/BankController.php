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
}