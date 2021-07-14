<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowDetail;
use Illuminate\Support\Facades\Mail;
use DB;

class HistoryController extends Controller
{
    public function historybill($borrowdetailID){
        $sql="SELECT * FROM historydetailbill WHERE BorrowDetailID = $borrowdetailID";
        $data = DB::select($sql);

        return response()->json($data);
    }
}