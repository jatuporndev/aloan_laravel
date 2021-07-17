<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaners;
use App\Models\Bank;
use Illuminate\Support\Facades\Auth;
use DB;

class LoanerRequestController extends Controller
{
    public function request($LoanerID)
    { 
        $sql="SELECT borrowers.*,request.* FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID = request.borrowlistID
        INNER JOIN borrowers ON request.BorrowerID  = borrowers.BorrowerID 
        WHERE (request.status = 0 OR request.status = 1) AND  borrowlist.LoanerID = $LoanerID " ;
        $post=DB::select($sql);   
              
        return view('dashboard.loaner.menu', ['post'=> $post]);
    }

    public function ViewBorrowerRequest($requestID)
    { 
        $sql="SELECT * FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID = request.borrowlistID
        INNER JOIN borrowers ON request.BorrowerID  = borrowers.BorrowerID 
        WHERE request.RequestID= $requestID " ;
        $post=DB::select($sql)[0];      
           
        return view('dashboard.loaner.menu2', ['view'=> $post]);
    }
}