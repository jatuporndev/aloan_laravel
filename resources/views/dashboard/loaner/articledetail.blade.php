@extends('dashboard.loaner.dashboardlayout')

@section('content')
  <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark  border-bottom" style="background-image: linear-gradient( 135deg, #81FBB8 10%, #28C76F 100%);">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
            </li>
          </ul>
         
              
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{ url('/') }}/assets/uploadfile/Loaner/profile/{{ Auth::guard('loaner')->user()->imageProfile }}" class="loaner_picture">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm font-weight-bold" style="color:white">{{ Auth::guard('loaner')->user()->firstname }}</span>
                  </div>
                </div>
              
           
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 " style="background-image: linear-gradient( 135deg, #81FBB8 10%, #28C76F 100%);">
<div class="header pb-4"  style="background-image: linear-gradient( 135deg, #81FBB8 10%, #28C76F 100%);"> 
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">ข่าวสาร</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('loaner.article') }}">บทความข่าวสาร</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$view->title }}</li>
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
            <a class="col-4 pr-0" href="/loaner/articledetail/{{$item->ArticleID}}">
                <img src="{{ url('/') }}/assets/uploadfile/article/{{ $item->image_article}}" style="width: 100%;" data-no-play="true" data-youtube="">
            </a>
            <div class="col-8">
                <h5>
                    <a class="t-gray" href="/loaner/articledetail/{{$item->ArticleID}}"><h3>{{$item->title}}</h3></a>
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











@endsection