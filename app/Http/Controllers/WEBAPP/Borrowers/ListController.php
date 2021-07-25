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

    public function delete($borrowerID,$BorrowelistID)
    { 
        $sql="DELETE FROM pined WHERE borrowerID=$borrowerID AND borrowlistID =$BorrowelistID";
        $recount=DB::select($sql);   

         return redirect()->back()->with('success','ลบแล้ว');
    }

    public function addpined($borrowerID,$BorrowelistID)
    { 
        $user = new Pined();
        $user->BorrowerID  = $borrowerID;
        $user->borrowlistID  = $BorrowelistID;
        $user->save();


        return redirect()->back()->with('success','เพิ่มแล้ว');
    }
}
