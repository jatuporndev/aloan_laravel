<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use App\Models\Bank;
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
}