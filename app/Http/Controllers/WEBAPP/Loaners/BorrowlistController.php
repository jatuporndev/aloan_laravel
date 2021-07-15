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

        $sql="INSERT INTO criterion
             ( Age_range, Saraly_range, Married,borrowlistID,money_max,instullment_max)
        VALUES
          (0, 0, 0,$borrowlistID,$money_max,$instullment_max), 
          (1, 0, 0,$borrowlistID,$money_max,$instullment_max), 
          (2, 0, 0,$borrowlistID,$money_max,$instullment_max),
          (3, 0, 0,$borrowlistID,$money_max,$instullment_max),
          (0, 1, 0,$borrowlistID,$money_max,$instullment_max),
          (1, 1, 0,$borrowlistID,$money_max,$instullment_max),
          (2, 1, 0,$borrowlistID,$money_max,$instullment_max),
          (3, 1, 0,$borrowlistID,$money_max,$instullment_max),
          (0, 2, 0,$borrowlistID,$money_max,$instullment_max),
          (1, 2, 0,$borrowlistID,$money_max,$instullment_max),
          (2, 2, 0,$borrowlistID,$money_max,$instullment_max),
          (3, 2, 0,$borrowlistID,$money_max,$instullment_max),
          (0, 3, 0,$borrowlistID,$money_max,$instullment_max),
          (1, 3, 0,$borrowlistID,$money_max,$instullment_max),
          (2, 3, 0,$borrowlistID,$money_max,$instullment_max),
          (3, 3, 0,$borrowlistID,$money_max,$instullment_max),

          (0, 0, 1,$borrowlistID,$money_max,$instullment_max), 
          (1, 0, 1,$borrowlistID,$money_max,$instullment_max), 
          (2, 0, 1,$borrowlistID,$money_max,$instullment_max),
          (3, 0, 1,$borrowlistID,$money_max,$instullment_max),
          (0, 1, 1,$borrowlistID,$money_max,$instullment_max),
          (1, 1, 1,$borrowlistID,$money_max,$instullment_max),
          (2, 1, 1,$borrowlistID,$money_max,$instullment_max),
          (3, 1, 1,$borrowlistID,$money_max,$instullment_max),
          (0, 2, 1,$borrowlistID,$money_max,$instullment_max),
          (1, 2, 1,$borrowlistID,$money_max,$instullment_max),
          (2, 2, 1,$borrowlistID,$money_max,$instullment_max),
          (3, 2, 1,$borrowlistID,$money_max,$instullment_max),
          (0, 3, 1,$borrowlistID,$money_max,$instullment_max),
          (1, 3, 1,$borrowlistID,$money_max,$instullment_max),
          (2, 3, 1,$borrowlistID,$money_max,$instullment_max),
          (3, 3, 1,$borrowlistID,$money_max,$instullment_max)";

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
<<<<<<< HEAD
                
                $borrowerlist = Borrowlist::find($id);  
                $borrowerlist->	money_min = $request->get('money_min');  
                $borrowerlist->money_max =$request->get('money_max');       
                $borrowerlist->	interest = $request->get('interest');  
                $borrowerlist->	Interest_penalty = $request->get('Interest_penalty');  
                $borrowerlist->instullment_max = $request->get('instullment_max');
                $save = $borrowerlist->save();
=======
           /*     
            $borrowerlist =Borrowlist::where('LoanerID', '=', $id)->firstOrFail();
            $borrowerlist->money_min = $request->get('money_min');
            $borrowerlist->money_max = $request->get('money_max');        
            $borrowerlist->interest = $request->get('interest');    
            $borrowerlist->Interest_penalty = $request->get('Interest_penalty');   
            $borrowerlist->instullment_max = $request->get('instullment_max');   
            $borrowerlist->save();
    
            $moneyMax=$request->get('money_max');
            $cri="UPDATE criterion SET money_max = $moneyMax,instullment_max= $borrowerlist->instullment_max
            WHERE borrowlistID =$borrowerlist->borrowlistID AND money_max > $borrowerlist->money_max OR instullment_max > $borrowerlist->instullment_max";
            DB::select($cri);
    */
>>>>>>> 7855516930a5d28d51e38ea9c8202e51571c6f59

                $moneyMax=$request->get('money_max');
                $cri="UPDATE criterion SET money_max = $moneyMax,instullment_max= $borrowerlist->instullment_max
                WHERE borrowlistID =$borrowerlist->borrowlistID AND money_max > $borrowerlist->money_max OR instullment_max > $borrowerlist->instullment_max";
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
            
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
                
                $criterionlist = Criterion::find($id);                
                $criterionlist->money_max =$request->get('money_max');      
                $criterionlist->instullment_max =$request->get('instullment_max');  
                $criterionlist->edit = 1;
                $save = $criterionlist->save();

            if( $save ){
              //return response()->json(['status'=>1, 'msg'=>'บันทึกข้อมูลสำเร็จ']);
                 return redirect()->route('loaner.home')->with('success','บันทึกข้อมูลสำเร็จ');
            }
        }
    }
}

