<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use App\Models\Pined;
use DB;

class ListController extends Controller
{
    public function index(Request $request)
    {       
        $spinM= $request->get('money_max');
        $spinI = $request->get('interest');       
        $search = $request->get('search');

        $sql="SELECT *  FROM borrowlist 
        INNER JOIN loaners ON loaners.LoanerID  = borrowlist.LoanerID
        WHERE  borrowlist.status= '1' ";
        
        if($spinM!=""){
            $sql.=" AND borrowlist.money_max>=$spinM";      
        }
        if($spinI!=""){
            $sql.=" AND borrowlist.interest<=$spinI"; 
        }
        if($search!=""){
            $sql.=" AND (loaners.Firstname LIKE '%$search%' 
            OR loaners.Lastname LIKE '%$search%') ";
        }
       
        $dataloaner=DB::select($sql);         
        return view('dashboard.borrower.home', ['dataloaner'=> $dataloaner]);
    }

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
