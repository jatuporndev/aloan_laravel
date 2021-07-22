<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use App\Models\Bank;
use App\Models\HistoryBill;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use DB;

class BorrowerBorrowDetailController extends Controller
{
    public function ManuPaydetail($BorrowDetailID){

        $sql="SELECT borrowdetail.*,loaners.*,(borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100))) as total FROM borrowdetail 
              INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
              INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
              WHERE 1 AND  BorrowDetailID = $BorrowDetailID";

        $data = DB::select($sql)[0];
        return view('dashboard.borrower.menu3Detail', ['view'=> $data]);
    }
        
    public function payment(Request $request,$BorrowDetailID){
        $data =$request->get('totalMoney');
        $HisIDArray = $request->get('aryhistoryID');
        $Moneybase = $request->get('Moneybase');
        $loanerID = $request->get('loanerID');
       // $HisIDArray = json_decode('['.$data2.']',true);

        return view('dashboard.borrower.payment', ['totalMoney'=> $data,
                                                   'BorrowDetailID'=>$BorrowDetailID,
                                                   'arrayHistorID'=>$HisIDArray,
                                                   'loanerID'=>$loanerID,
                                                   'Moneybase'=>$Moneybase]);
      
    }    


    public function crateHistoryBill(Request $request,$BorrowDetailID)
    {       

        date_default_timezone_set('Asia/Bangkok');
        $data = new HistoryBill();
        $data-> datepaying = date('Y-m-d');  
        $data-> money =$request->get('Moneybase');
        $data-> BorrowDetailID = $BorrowDetailID; 
        $data-> money_total = $request->get('moneyTotal');

        $file = $request->file('imageBill');
        if(isset($file)){
            $file->move('assets/uploadfile/Borrower/payment',$file->getClientOriginalName());
            $data->imageBill = $file->getClientOriginalName();
        } 
        $data->save();

        $HisIDArray = $request->get('arrayHistoryID');
        $HisIDArray = json_decode('['.$HisIDArray.']',true);


        $sql="SELECT `historyDetailID` FROM `historydetailbill` WHERE 1 ORDER by `historyDetailID` DESC";
        $datahis = DB::select($sql)[0];
        
        foreach ($HisIDArray as $historyID){
        date_default_timezone_set('Asia/Bangkok');
        $data = History::find($historyID);
        $data-> date_pay = date('Y-m-d');
        $data->historyDetailID = $datahis->historyDetailID;    
        $data->status = 1;      
        $data->save();

        }


        ///////////////////////////////////////////////////////
        $sqlb="SELECT borrowdetail.*,loaners.*,(borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100))) as total FROM borrowdetail 
        INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
        INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
        WHERE 1 AND  BorrowDetailID = $BorrowDetailID";
       
        $datab = DB::select($sqlb)[0];
        return redirect()->route('borrower.menu3Detail',['BorrowDetailID' =>$BorrowDetailID]);
    }

}