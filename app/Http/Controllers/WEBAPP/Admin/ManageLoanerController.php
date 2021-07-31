<?php

namespace App\Http\Controllers\WEBAPP\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Loaners;
use App\Models\Loaner;


class ManageLoanerController extends Controller
{
    public function show(Request $request){
        
         $status=$request->get('status'); 
       // $sql = "SELECT * FROM loaners WHERE verify = 0";
        //$post = DB::select($sql);
        if($status=="1"){
        $post = Loaner::where('verify', '=', 0)->get();
        }
        if($status=="2"){
           // $post = Loaner::where('verify', '!=', 0)->paginate(60);
              $sql = "SELECT * FROM loaners";
              $post = DB::select($sql);
        }else{
            $post = Loaner::where('verify', '=', 0)->get();
        }
        
        return view('dashboard.admin.loanermanage', ['post'=> $post]);
    }

    public function view($LoanerID){
        
         
        $sql = "SELECT * FROM loaners WHERE LoanerID =$LoanerID";
        $post = DB::select($sql)[0];

        
        
        return view('dashboard.admin.loanerview', ['view'=> $post]);
    }

    public function update1($LoanerID){
        
        $a =Loaners::where('LoanerID', '=', $LoanerID)->firstOrFail();
        $a->verify = 1;
        $a->save();

        
        return redirect('admin/loanerview/view/'.$LoanerID)->with('success','Approve Success');
    }
    public function update2($LoanerID){
        
        $a =Loaners::where('LoanerID', '=', $LoanerID)->firstOrFail();
        $a->verify = 2;
        $a->save();

        
        return redirect('admin/loanerview/view/'.$LoanerID)->with('fail','Reject Success');
    }


}


