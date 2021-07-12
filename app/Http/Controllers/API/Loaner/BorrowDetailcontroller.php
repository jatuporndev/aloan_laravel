<?php
namespace App\Http\Controllers\API\Loaner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowDetail;
use App\Models\RequestM;
use App\Models\History;
use Illuminate\Support\Facades\Mail;
use DB;

class BorrowDetailcontroller extends Controller
{
    public function add(Request $request,$RequestID)
    { 
        
        date_default_timezone_set('Asia/Bangkok');
        $sql="SELECT *  FROM request WHERE RequestID = $RequestID" ;
        $datarequest=DB::select($sql)[0];

        $detail = new Borrowdetail();
        $detail ->date_start = date('Y-m-d');
        $detail ->Update_date = date('Y-m-d');

        $effectiveDate = date('Y-m-d');
        $effectiveDate = strtotime("+".$datarequest->instullment_confirm." months", strtotime($effectiveDate)); // or you can use '-90 day' for deduct
        $detail ->Date_end = date('Y-m-d',$effectiveDate);;

        $detail ->Principle = $datarequest->money_confirm;
        $detail ->Interest = $datarequest->Interest_request;
        $detail ->Interest_penalty = $datarequest->Interest_penalty_request;

        $money =$datarequest->money_confirm;;//เงินต้น
        $instu =$datarequest->instullment_confirm;//งวด
        $inter =$datarequest->Interest_request;//ดอกเบี้ย
        $detail ->remain = $money+($money*($inter/100));
        $detail ->instullment_total = $datarequest->instullment_confirm;
        $detail ->instullment_Amount = $datarequest->instullment_confirm;

        $file = $request->file('receipt_slip');
        if(isset($file)){
            $file->move('assets/uploadfile/Loaner/slip',$file->getClientOriginalName());
            $detail->receipt_slip = $file->getClientOriginalName();
        } 

        $detail ->BorrowerID  = $datarequest->BorrowerID;
        $detail ->borrowlistID  = $datarequest->borrowlistID;
        $detail ->RequestID  =$datarequest->RequestID;
        $detail ->save();  

        $user = RequestM::find($RequestID);
        $user->status = 3;      
        $user->save();

        $sql="SELECT *  FROM borrowers WHERE BorrowerID= $user->BorrowerID" ;
        $datarequest=DB::select($sql)[0];


        for($i=1; $i <= $detail->instullment_total; $i++){
        $effectiveDate2 = date('Y-m-d');
        $history = new History();
        $effectiveDate2 = strtotime("+".$i." months", strtotime($effectiveDate2));
        $history ->settlement_date = date('Y-m-d',$effectiveDate2);
        $history ->BorrowDetailID =$detail->BorrowDetailID;
        $history ->save();
    }

      /*  $to_name = "RECEIVER_NAME";
        $to_email = "Yoneya.ohm1221@gmail";
        $data = array(
            "name" => "สวัสดีคุณ ".$datarequest->firstname." ".$datarequest->lastname,
            "body" => "วันที่ทำรายการ ".date('Y-m-d'),
            "body" => "ผู้ให้กู้โอนเงินเรียบร้อยแล้ว ".date('Y-m-d'),
            "slip"  => $detail->receipt_slip,           
            "not"  => "นี้เป็นข้อความแจ้งเตือน ไม่ต้องตอบกลับ");
        Mail::send('email', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject("ผู้ให้กู้โอนเงินเรียบร้อยแล้ว");
       $message->from("Alone@gmail.com","Aloan Notification!");
        });
        */
        
        return response()->json($datarequest);
    }

    public function index($LoanerID){

        $sql="SELECT * FROM borrowdetail 
        INNER JOIN Borrowers ON borrowdetail.BorrowerID = Borrowers.BorrowerID
        INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
        WHERE 1 AND borrowlist.LoanerID = $LoanerID";
        $data = DB::select($sql);
        
        return response()->json($data);
    }

    public function checkpay($borrowdetailID){

        $sql="SELECT * FROM history WHERE BorrowDetailID = $borrowdetailID AND status = 1";
        $data = DB::select($sql);
        
        return response()->json($data);
    }

    public function ManuGetMoneydetail($BorrowDetailID){

        $sql="SELECT borrowdetail.*,Borrowers.* FROM borrowdetail 
              INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
              INNER JOIN Borrowers ON Borrowers.BorrowerID  = borrowdetail.BorrowerID 
              WHERE 1 AND  BorrowDetailID = $BorrowDetailID";

        $data = DB::select($sql)[0];
        return response()->json($data);
    }
    public function Bill($BorrowDetailID){

        $sql="SELECT * FROM historydetailbill 
              WHERE 1 AND  BorrowDetailID = $BorrowDetailID";

        $data = DB::select($sql);
        return response()->json($data);
    }

    public function test(){

    }

}