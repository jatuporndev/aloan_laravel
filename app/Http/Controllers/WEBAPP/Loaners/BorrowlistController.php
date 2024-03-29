<?php

namespace App\Http\Controllers\WEBAPP\Loaners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowlist;
use App\Models\Criterion;
use DB;
use Validator;

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
        $sql="SELECT * FROM borrowlist WHERE borrowlistID =$borrowlistID";
        $dataBorrowlist=DB::select($sql)[0];  
        $money_max = $dataBorrowlist->money_max;
        $instullment_max = $dataBorrowlist->instullment_max;
        $interest = $dataBorrowlist->interest;

        $sql="INSERT INTO criterion
             ( Age_range, Saraly_range, Married,borrowlistID,money_max,instullment_max,interest)
        VALUES
          (0, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest), 
          (2, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest), 
          (3, 0, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 1, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 2, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 3, 0,$borrowlistID,$money_max,$instullment_max,$interest),

          (0, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest), 
          (1, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest), 
          (2, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 0, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 1, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 2, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (0, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (1, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (2, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest),
          (3, 3, 1,$borrowlistID,$money_max,$instullment_max,$interest)";
          
       // $sql="SELECT *  FROM criterion WHERE borrowlistID =$id";
        $recount=DB::select($sql);         
        return redirect()->route('loaner.home');   
    }

    

    public function update(Request $request, $id)
    {   
        //add user data into users table
        // $borrowerlist = Borrowlist::find($id);  
        // $borrowerlist->	money_min = $request->get('money_min');  
        // $borrowerlist->money_max =$request->get('money_max');       
        // $borrowerlist->	interest = $request->get('interest');  
        // $borrowerlist->	Interest_penalty = $request->get('Interest_penalty');  
        // $borrowerlist->save();     
        // return redirect()->route('loaner.home')->with('success','ss');
        $validator = \Validator::make($request->all(),[
            'money_min'=>'required|integer|min:1',
            'money_max'=>'required|integer|min:1',
            'interest'=>'required|integer|min:1|max:15',
            'Interest_penalty'=>'required|integer|min:1',
            'instullment_max'=>'required|integer|min:1|max:24',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
 
                $borrowerlist = Borrowlist::find($id);  
                $borrowerlist->	money_min = $request->get('money_min');  
                $borrowerlist->money_max =$request->get('money_max');       
                $borrowerlist->	interest = $request->get('interest');  
                $borrowerlist->	Interest_penalty = $request->get('Interest_penalty');  
                $borrowerlist->instullment_max = $request->get('instullment_max');
                $save = $borrowerlist->save();

                $moneyMax=$request->get('money_max');
                $cri="UPDATE criterion SET money_max = $moneyMax
                WHERE borrowlistID =$borrowerlist->borrowlistID AND money_max > $borrowerlist->money_max";
                DB::select($cri);
        
                $cri="UPDATE criterion SET instullment_max= $borrowerlist->instullment_max
                WHERE borrowlistID =$borrowerlist->borrowlistID AND   instullment_max > $borrowerlist->instullment_max ";
                DB::select($cri);
        
                $cri="UPDATE criterion SET interest = $borrowerlist->interest
                WHERE borrowlistID =$borrowerlist->borrowlistID AND interest > $borrowerlist->interest";
                DB::select($cri);

            if( $save ){
                return response()->json(['status'=>1, 'msg'=>'บันทึกข้อมูลสำเร็จ']);
            }
        }
  }
    
    public function updateCri(Request $request, $id){
         
        $validator = \Validator::make($request->all(),[
            'money_max'=>'required|integer|min:1',
            'instullment_max'=>'required|integer|min:1',
            'interest'=>'required|integer|min:1',
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
                
                $criterionlist = Criterion::find($id);                
                $criterionlist->money_max =$request->get('money_max');      
                $criterionlist->instullment_max =$request->get('instullment_max');  
                $criterionlist->interest =$request->get('interest');  
                $criterionlist->edit = 1;
                $save = $criterionlist->save();

            if( $save ){
              //return response()->json(['status'=>1, 'msg'=>'บันทึกข้อมูลสำเร็จ']);
                 return redirect()->route('loaner.home')->with('success','บันทึกข้อมูลสำเร็จ');
            }
        }
    }

    public function setpublic($id,$status)
    {       
        $sql="UPDATE borrowlist SET status = $status WHERE LoanerID=$id";
        $recount=DB::select($sql);         
        return redirect()->route('loaner.home');
    }
}

