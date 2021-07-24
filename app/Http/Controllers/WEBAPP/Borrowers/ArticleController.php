<?php

namespace App\Http\Controllers\WEBAPP\Borrowers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowers;
use App\Models\Bank;
use App\Models\HistoryBill;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticleController extends Controller
{

    public function articledetail($ArticleID){
        $sql1="UPDATE article SET view = view + 1 WHERE  ArticleID = $ArticleID";
        $data1 = DB::select($sql1);

        $sql="SELECT * FROM article WHERE ArticleID = $ArticleID  ";
        $data = DB::select($sql)[0];


        return view('dashboard.borrower.articledetail', ['view'=> $data]);
    }

    public function articledetailLoaner($ArticleID){
        $sql1="UPDATE article SET view = view + 1 WHERE  ArticleID = $ArticleID";
        $data1 = DB::select($sql1);

        $sql="SELECT * FROM article WHERE ArticleID = $ArticleID  ";
        $data = DB::select($sql)[0];


        return view('dashboard.loaner.articledetail', ['view'=> $data]);
    }
}