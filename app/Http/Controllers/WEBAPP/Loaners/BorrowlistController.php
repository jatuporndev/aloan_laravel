<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowlist;
use DB;
class BorrowlistController extends Controller
{
    public function create($id)
    {
        //add user data into users table
        $borrowerlist = new Borrowlist();
        $borrowerlist->	money_min = 0;
        $borrowerlist->money_max = 15000;        
        $borrowerlist->	interest = 5;
        $borrowerlist->	Interest_penalty = 5;
        $borrowerlist->	LoanerID = $id;
         
        $borrowerlist->save();                
        return redirect('loaner/setborrowlist/'.$id);
    }
    public function insertCri($borrowlistID)
    { 
        $sql="INSERT INTO criterion
             ( Age_range, Saraly_range, Married,borrowlistID )
        VALUES
          (0, 0, 0,$borrowlistID), 
          (1, 0, 0,$borrowlistID), 
          (2, 0, 0,$borrowlistID),
          (3, 0, 0,$borrowlistID),
          (0, 1, 0,$borrowlistID),
          (1, 1, 0,$borrowlistID),
          (2, 1, 0,$borrowlistID),
          (3, 1, 0,$borrowlistID),
          (0, 2, 0,$borrowlistID),
          (1, 2, 0,$borrowlistID),
          (2, 2, 0,$borrowlistID),
          (3, 2, 0,$borrowlistID),
          (0, 3, 0,$borrowlistID),
          (1, 3, 0,$borrowlistID),
          (2, 3, 0,$borrowlistID),
          (3, 3, 0,$borrowlistID),

          (0, 0, 1,$borrowlistID), 
          (1, 0, 1,$borrowlistID), 
          (2, 0, 1,$borrowlistID),
          (3, 0, 1,$borrowlistID),
          (0, 1, 1,$borrowlistID),
          (1, 1, 1,$borrowlistID),
          (2, 1, 1,$borrowlistID),
          (3, 1, 1,$borrowlistID),
          (0, 2, 1,$borrowlistID),
          (1, 2, 1,$borrowlistID),
          (2, 2, 1,$borrowlistID),
          (3, 2, 1,$borrowlistID),
          (0, 3, 1,$borrowlistID),
          (1, 3, 1,$borrowlistID),
          (2, 3, 1,$borrowlistID),
          (3, 3, 1,$borrowlistID)";

       // $sql="SELECT *  FROM criterion WHERE borrowlistID =$id";
        $recount=DB::select($sql);         
        return redirect()->route('loaner.home');
        
    }
    public function update($id,Request $request)
    {   
    
        //add user data into users table
        $borrowerlist = Borrowlist::find($id);  
        $borrowerlist->	money_min = $request->get('money_min');  
        $borrowerlist->money_max =$request->get('money_max');       
        $borrowerlist->	interest = $request->get('interest');  
        $borrowerlist->	Interest_penalty = $request->get('Interest_penalty');  
        $borrowerlist->save();     

        
        

        return redirect()->route('loaner.home');
    }

}