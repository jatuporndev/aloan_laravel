<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use App\Models\Pined;
use DB;

class ListController extends Controller
{
    public function viewborrower($LoanerID){

        $sql="SELECT *  FROM borrowlist 
        INNER JOIN loaners ON loaners.LoanerID  = borrowlist.LoanerID 
        WHERE loaners.LoanerID=$LoanerID";
        $views=DB::select($sql)[0];   

        return view('dashboard.borrower.request', ['view'=> $views]);
    }
}
