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
}