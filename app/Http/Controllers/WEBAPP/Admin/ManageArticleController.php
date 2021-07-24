<?php

namespace App\Http\Controllers\WEBAPP\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Borrowers;
use App\Models\Article;

class ManageArticleController extends Controller
{
    public function add(Request $request){

        date_default_timezone_set('Asia/Bangkok');
        $data = new Article();
        $data-> dateCreate = date('Y-m-d');  
        $data-> title =$request->get('title');
        $data-> detail = $request->get('detail');; 


        $file = $request->file('image_article');
        if(isset($file)){
            $file->move('assets/uploadfile/article/',$file->getClientOriginalName());
            $data->image_article = $file->getClientOriginalName();
        } 
        $data->save();
        return redirect()->back()->with('success','success');

    }

    public function articledetail($ArticleID){
        $sql1="UPDATE article SET view = view + 1 WHERE  ArticleID = $ArticleID";
        $data1 = DB::select($sql1);

        $sql="SELECT * FROM article WHERE ArticleID = $ArticleID  ";
        $data = DB::select($sql)[0];


        return view('dashboard.admin.AdminAriticleDetail', ['view'=> $data]);
    }

    public function Deletearticle($ArticleID){
        
        $sql1="DELETE FROM article WHERE ArticleID =$ArticleID";
        $data1 = DB::select($sql1);

      return  redirect()->route('admin.AdminAriticle')->with('success','สำเร็จแล้ว');;
    }

    public function Update(Request $request,$ArticleID){

        date_default_timezone_set('Asia/Bangkok');
        $data = Article::find($ArticleID);
        $data-> dateCreate = date('Y-m-d');  
        $data-> title =$request->get('title');
        $data-> detail = $request->get('detail');; 


        $file = $request->file('image_article');
        if(isset($file)){
            $file->move('assets/uploadfile/article/',$file->getClientOriginalName());
            $data->image_article = $file->getClientOriginalName();
        } 
        $data->save();
        return   redirect()->route('admin.addArticleDetail',['ArticleID' =>$ArticleID])->with('success','สำเร็จแล้ว');;

    }

}