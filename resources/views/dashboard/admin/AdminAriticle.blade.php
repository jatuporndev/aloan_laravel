
@extends('dashboard.admin.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Article</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">article</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>
<div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">บทความข่าวสาร</h3>
            </div>
            <div style=" position: absolute;right: 0px;padding: 25px 50px;">   
                 <a data-toggle="modal" data-target="#add" button class="btn btn-info" style="color:#FFFFFF;"  type="button"> +add </a> 
                </div>

            <?php 
                    $post = DB::table('article')->get();
            ?>


<div class="container">
       
        <div class="row">
            <div class="col-8 col-lg-12">
            
</br>
    <h3>บทความข่าวสาร</h3>
    <div class="text-muted mb-2">
        ข่าวสาร
    </div>
                        
                   <!-- assets/uploadfile/article/ -->    
                   @foreach($post as $item)           
            <li class="media py-3 px-2" style="border-bottom: solid #DBDBDB;">
                <a href="/admin/addArticleDetail/{{$item->ArticleID}}" width="250" height="200">
                    <img src="{{ url('/') }}/assets/uploadfile/article/{{ $item->image_article}}" width="200" height="170" >
                </a>
                <div class="media-body col-10">
                    <h6 class="mt-0 mb-1">
                        <a  href="/admin/addArticleDetail/{{$item->ArticleID}}"><h2>{{$item->title}}</h2></a>
                    </h6>
                        <div style= "white-space: pre; width: 100%; height:50px; overflow: hidden; text-overflow: ellipsis; " > <?php   $a = strip_tags($item->detail); echo $a ?></div>อ่านต่อ...
                    
        <ul class="posts__meta" style="padding:18px;">
  
        <li style="display:inline;padding:0px 8px 0px 0px;"><i class="fa fa-calendar text-primary mr-1"></i> {{ $item ->dateCreate}}</li>
        <li style="display:inline;padding:8px;"><i class="fa fa-eye text-primary mr-1"></i> {{ $item ->view}}</li>
    </ul>

                </div>
            </li>
           @endforeach
            </ul>

                                                   
               <!--     <div class="row"><div class="col-md-12"><ul class="pagination"><li class="page-item prev disabled"><a href="#" class="page-link"><span>«</span></a></li><li class="page-item active"><a href="#" class="page-link"><span>1 <span class="sr-only">(current)</span></span></a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=2">2</a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=3">3</a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=4">4</a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=5">5</a></li><li class="page-item disabled"><a href="#" class="page-link"><span>…</span></a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=9">9</a></li><li class="page-item next"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=2">»</a></li></ul></div></div> -->
              

 </div>
        </div>
      </div>
</div>



<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="criModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title " id="criModalLabel">Add Article</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                                <form  action="{{ route('admin.addArticle')}}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">Title</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_minn text-center" name="title"   > 
                                                             
                                                              <span class="text-danger error-text money_min_error"></span>
                                                              </div>   
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                      <textarea class="input" rows="10" name="detail" cols="100%">Some text here</textarea> </br>  
                                                      </div>
                                                     
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">Image</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input type="file" class="form-control money_minn text-center" name="image_article"   > 
                                                             
                                                              <span class="text-danger error-text money_min_error"></span>
                                                              </div>   
                                                            </div>   
                                                            </div>

                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                                </div>
                                                </form>
                                            </div>
                                </div>
                          </div>
                    </div>

</div>
</div>
</div>


@endsection