<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowlist;
use App\Models\Criterion;
use App\Models\Bank;
use DB;
use Validator;

class LoanerBankController extends Controller
{
    public function delete($bankID)
    { 
        $sql="DELETE FROM loaner_bank WHERE bankID=$bankID";
        $recount=DB::select($sql);        

        return redirect()->route('loaner.profile');  
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

        return redirect()->route('loaner.profile')->with('success','บันทึกข้อมูลสำเร็จ');
   }
}