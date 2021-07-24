@extends('dashboard.admin.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Borrower</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Borrower</li>
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
            <form id="myform" method="post" action="{{ route('admin.Deletearticle',['ArticleID' =>$view->ArticleID]) }}">@csrf</form>
            <div style=" position: absolute;right: 0px;padding: 25px 50px;">   
            <a data-toggle="modal" data-target="#add" button class="btn btn-info" style="color:#FFFFFF;"  type="button"> edit </a> 
            <a onclick="document.getElementById('myform').submit();" style="color:#FFFFFF;" button  class="btn btn-danger" type="button">Delete</a> 
                </div >


<div >
                    <div style="padding:10px 15px;">

              


                    <h1>{{$view->title }}</h1>

                <ul class="posts__meta" style="padding:18px;">
     
        <li style="display:inline;padding:0px 8px 0px 0px;"><i class="fa fa-calendar text-primary mr-1"></i> {{$view->dateCreate }}</li>
        <li style="display:inline;padding:8px;"><i class="fa fa-eye text-primary mr-1"></i> {{$view->view }}</li>
    </ul>


            <div class="post-show__cover">
                <img class="img-fluid mb-2 w-100" alt="6 สิ่ง'สำคัญ'ที่คนหางานอยากเห็นในการลงประกาศงาน"  src="{{ url('/') }}/assets/uploadfile/article/{{ $view->image_article}}"   data-youtube="">
            </div>

         


            <div class="post-show__body">
                <h2 style="text-align: center;"><strong><span style="background-color: #ffff00;">{{$view->title }}</span></strong></h5>

              <div style="white-space: pre-wrap; ">
              <?php echo $view->detail ?>
                  
                    </div>
            </div>

            </div>
    </div>
 </div>
        </div>
        <div class="col-12 col-lg-4">
                                    <div class="card card--borderless mb-2">
    
</div>

    <div class="card card--borderless mb-2 p-1 post-sidebar" >
        <ul class="nav nav-tabs tab-post-sidebar" role="tablist" >
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-post-sidebar-1" role="tab">เรื่องล่าสุด</a>
            </li>
           
        </ul>
        <?php $sql="SELECT * FROM article WHERE ArticleID != $view->ArticleID LIMIT 7";
        $article = DB::select($sql); ?>
       <div class="tab-content p-1"  >
            <div class="tab-pane active" id="tab-post-sidebar-1" role="tabpanel" >
            <div  class="wg-toro wg-toro__wg_toro_post wg-toro--loaded" data-widget-name="wg_toro_post" data-widget-options="{&quot;title&quot;:&quot;&quot;,&quot;title_classes&quot;:&quot;&quot;,&quot;template&quot;:&quot;@ToroCms\/post\/widgets\/sidebar.html.twig&quot;,&quot;visibility&quot;:&quot;away&quot;,&quot;remote&quot;:{&quot;url&quot;:&quot;\/_widget\/render&quot;,&quot;route&quot;:&quot;toro_widget_render&quot;,&quot;method&quot;:&quot;GET&quot;},&quot;control&quot;:{&quot;mask&quot;:{&quot;mode&quot;:&quot;#loading-media-sm&quot;}},&quot;callback&quot;:{},&quot;scroll&quot;:&quot;&quot;,&quot;view_all_path&quot;:&quot;&quot;,&quot;limit&quot;:4,&quot;grid&quot;:&quot;dng_web_grid_post&quot;}" data-widget-visibility="away">
                                                                <div class="" style="width:auto;margin:auto;">
        @foreach($article as $item)
        
                   
                    <div class="hr" >
                                <div class="post__list--sm"  style="border-bottom: solid #DBDBDB;">
                                <div class="row">
            <a class="col-4 pr-0" href="/admin/addArticleDetail/{{$item->ArticleID}}">
                <img src="{{ url('/') }}/assets/uploadfile/article/{{ $item->image_article}}" style="width: 100%;" data-no-play="true" data-youtube="">
            </a>
            <div class="col-8">
                <h5>
                    <a class="t-gray" href="/admin/addArticleDetail/{{$item->ArticleID}}"><h3>{{$item->title}}</h3></a>
                </h5>
                <div   style= "white-space: inline; width: 90%; height:40px; overflow: hidden; text-overflow: ellipsis; ; " ><h5 style="color:#A9A9A9"> <?php   $a = strip_tags($item->detail); echo $a ?></h5> </div></br>
                    <ul class="posts__meta">
                        
        <li style="display:inline;padding:0px 8px 0px 0px;"><i class="fa fa-calendar text-primary mr-1"></i> {{ $item ->dateCreate}}</li>
        <li style="display:inline;padding:8px;"><i class="fa fa-eye text-primary mr-1"></i> {{$item->view}}</li>
    </ul>

            </div>
        </div>
    </div>
    
</br>
        @endforeach

        </div>
            </div>
                   

            </div>
            </div>
            </div>
            </div>
            <div class="tab-pane" id="tab-post-sidebar-2" role="tabpanel">
                    <div class="wg-toro wg-toro__wg_toro_post" data-widget-name="wg_toro_post" data-widget-options="{&quot;title&quot;:&quot;&quot;,&quot;title_classes&quot;:&quot;&quot;,&quot;template&quot;:&quot;@ToroCms\/post\/widgets\/sidebar.html.twig&quot;,&quot;visibility&quot;:&quot;onscreen&quot;,&quot;remote&quot;:{&quot;url&quot;:&quot;\/_widget\/render&quot;,&quot;route&quot;:&quot;toro_widget_render&quot;,&quot;method&quot;:&quot;GET&quot;},&quot;control&quot;:{&quot;mask&quot;:{&quot;mode&quot;:&quot;#loading-media-sm&quot;}},&quot;callback&quot;:{},&quot;scroll&quot;:null,&quot;heading&quot;:null,&quot;criteria&quot;:{&quot;published&quot;:{&quot;value&quot;:1,&quot;type&quot;:&quot;equal&quot;}},&quot;view_all_path&quot;:null,&quot;limit&quot;:4,&quot;grid&quot;:&quot;dng_web_grid_post_popular&quot;}" data-widget-visibility="onscreen">
            </div>
            </div>
        </div>
    </div>


    <div class="mx-auto mb-2" style="max-width:255px">
            <div class="wg-toro wg-toro__wg_ads wg-toro--loaded" data-widget-name="wg_ads" data-widget-options="{&quot;title&quot;:&quot;&quot;,&quot;title_classes&quot;:&quot;&quot;,&quot;template&quot;:&quot;@ToroCms\/ads\/images.html.twig&quot;,&quot;visibility&quot;:&quot;away&quot;,&quot;remote&quot;:{&quot;url&quot;:&quot;\/_widget\/render&quot;,&quot;route&quot;:&quot;toro_widget_render&quot;,&quot;method&quot;:&quot;GET&quot;},&quot;control&quot;:{&quot;mask&quot;:{&quot;mode&quot;:&quot;none&quot;}},&quot;callback&quot;:{},&quot;scroll&quot;:&quot;&quot;,&quot;zone&quot;:&quot;home-side&quot;,&quot;limit&quot;:1,&quot;ads_to_show&quot;:1,&quot;slide_to_scoll&quot;:1,&quot;arrow&quot;:false,&quot;vertical_item&quot;:1,&quot;ads_item_style&quot;:&quot;&quot;,&quot;fade&quot;:false,&quot;responsive&quot;:{},&quot;ads_dots&quot;:false,&quot;ads_style&quot;:&quot;&quot;,&quot;random&quot;:true,&quot;lazyload&quot;:true}" data-widget-visibility="away">
                                                                            
                </div>
    </div>

    <div class="mx-auto mb-2" style="max-width:255px">
            <div class="wg-toro wg-toro__wg_ads wg-toro--loaded" data-widget-name="wg_ads" data-widget-options="{&quot;title&quot;:&quot;&quot;,&quot;title_classes&quot;:&quot;&quot;,&quot;template&quot;:&quot;@ToroCms\/ads\/images.html.twig&quot;,&quot;visibility&quot;:&quot;away&quot;,&quot;remote&quot;:{&quot;url&quot;:&quot;\/_widget\/render&quot;,&quot;route&quot;:&quot;toro_widget_render&quot;,&quot;method&quot;:&quot;GET&quot;},&quot;control&quot;:{&quot;mask&quot;:{&quot;mode&quot;:&quot;none&quot;}},&quot;callback&quot;:{},&quot;scroll&quot;:&quot;&quot;,&quot;zone&quot;:&quot;home-side-01&quot;,&quot;limit&quot;:1,&quot;ads_to_show&quot;:1,&quot;slide_to_scoll&quot;:1,&quot;arrow&quot;:false,&quot;vertical_item&quot;:1,&quot;ads_item_style&quot;:&quot;&quot;,&quot;fade&quot;:false,&quot;responsive&quot;:{},&quot;ads_dots&quot;:false,&quot;ads_style&quot;:&quot;&quot;,&quot;random&quot;:true,&quot;lazyload&quot;:true}" data-widget-visibility="away">
                                                                            
                </div>
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
                                                <form  action="{{ route('admin.Updatearticle',['ArticleID' =>$view->ArticleID]) }}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">Title</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input  name="title" value="{{$view->title}}"  > 
                                                             
                                                              <span class="text-danger error-text money_min_error"></span>
                                                              </div>   
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                      <textarea class="input" rows="10" name="detail" cols="100%">  {{$view->detail}} </textarea> </br>  
                                                      </div>
                                                     
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">Image</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input type="file" class="form-control money_minn text-center" name="image_article" value="{{ url('/') }}/assets/uploadfile/article/{{ $view->image_article}}"  > 
                                                             
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






@endsection