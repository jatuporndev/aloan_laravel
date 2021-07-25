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
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">บทความข่าวสาร</li>
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
              
                </div>

            <?php 
                    $post = DB::table('article')->get();
            ?>


<div class="container posts">
        <div class="posts__nav">
                                </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                
     

</br>
    <h3>บทความข่าวสาร</h3>
    <div class="text-muted mb-2">
        ข่าวสาร
    </div>
                        
                   <!-- assets/uploadfile/article/ -->    
                   @foreach($post as $item)           
            <li class="media py-3 px-2" style="border-bottom: solid #DBDBDB;">
                <a href="/loaner/articledetail/{{$item->ArticleID}}" width="250" height="200">
                    <img src="{{ url('/') }}/assets/uploadfile/article/{{ $item->image_article}}" width="200" height="170"  data-youtube="" data-no-play="true">
                </a>
                <div class="media-body col-9">
                    <h6 class="mt-0 mb-1">
                        <a  href="/loaner/articledetail/{{$item->ArticleID}}"><h2>{{$item->title}}</h2></a>
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

                                                    <div class="">
                                                        <div class="paginate">
               <!--     <div class="row"><div class="col-md-12"><ul class="pagination"><li class="page-item prev disabled"><a href="#" class="page-link"><span>«</span></a></li><li class="page-item active"><a href="#" class="page-link"><span>1 <span class="sr-only">(current)</span></span></a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=2">2</a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=3">3</a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=4">4</a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=5">5</a></li><li class="page-item disabled"><a href="#" class="page-link"><span>…</span></a></li><li class="page-item"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=9">9</a></li><li class="page-item next"><a class="page-link" href="/blogs/%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2?page=2">»</a></li></ul></div></div> -->
                </div>
            
                    </div>
    

    
            </div>
            <div class="col-12 col-lg-4">
                                    <div class="card card--borderless mb-2">
    

    
        </div>
    </div>

 </div>
        </div>
      </div>
</div>









@endsection