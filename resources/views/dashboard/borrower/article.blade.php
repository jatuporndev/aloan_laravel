@extends('dashboard.borrower.dashboardlayout')

@section('content')
<div class="header pb-4"  style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);"> 
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('borrower.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('borrower.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
                  </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>

<div class="container-fluid mt--5">
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
                <a href="/borrower/articledetail/{{$item->ArticleID}}" width="250" height="200">
                    <img src="{{ url('/') }}/assets/uploadfile/article/{{ $item->image_article}}" width="200" height="170"  data-youtube="" data-no-play="true">
                </a>
                <div class="media-body col-9">
                    <h6 class="mt-0 mb-1">
                        <a  href="/borrower/articledetail/{{$item->ArticleID}}"><h2>{{$item->title}}</h2></a>
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