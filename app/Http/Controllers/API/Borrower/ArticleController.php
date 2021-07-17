<?php
namespace App\Http\Controllers\API\Borrower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticleController extends Controller
{

    public function index(Request $request){

        $title = $request->get('title');
        $sql="SELECT * FROM article WHERE 1  ";

        if($title != ""){
            $sql.="AND title LIKE '%$title%'";
        }

        $data = DB::select($sql);


        return response()->json($data);
    }

    public function articledetail($ArticleID){
        $sql1="UPDATE article SET view = view + 1 WHERE  ArticleID = $ArticleID";
        $data1 = DB::select($sql1);

        $sql="SELECT * FROM article WHERE ArticleID = $ArticleID  ";
        $data = DB::select($sql)[0];


        return response()->json($data);
    }

}