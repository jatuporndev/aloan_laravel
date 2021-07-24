
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
                  
                </div>
              
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
    <div class="header pb-4"  style="background-image: linear-gradient( 135deg, #81FBB8 10%, #28C76F 100%);">
<div class="header pb-4"  style="background-image: linear-gradient( 135deg, #81FBB8 10%, #28C76F 100%);">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">ตรวจสอบ</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('loaner.menu2') }}">รอโอนเงิน</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ผู้กู้</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>
<?php
$data = $view -> bank;
 $sql="SELECT * FROM banklist 
 WHERE bankname ='$data'";
  
 $bank=DB::select($sql)[0];     
?>

 <!-- Page content -->
 <div class="container-fluid mt--4">
      <div class="row justify-content-center">
       
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">#{{$view -> BorrowerID}} ตรวจสอบข้อมูลผู้กู้ คุณ{{$view -> firstname}} {{$view -> lastname}}</h3>
                </div>
               
              </div>
            </div>
            <div class="card-body">
            <form  action="{{ route('loaner.addBorrowDetail',['id' => $view->RequestID]) }}" method="POST" enctype="multipart/form-data" >
                     @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <p>
                <img src="{{ url('/') }}/assets/uploadfile/Borrower/profile/{{ $view->imageProfile }}" width='200px' height='200px'>
                </p>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" >Firstname</label>
                       <p>
                       {{$view -> firstname}}
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >Lastname</label>
                       <p>
                       {{$view -> lastname}}
                       </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" >Birthday</label>
                       <p>
                       {{$view -> birthday}}
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >Gender</label>
                      <p>
                       @if ($view->gender == 0)
                            Man
                       @else ($view->gender == 1) 
                            Woman    
                    @endif
                       </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >Marry</label>
                      <p>
                      @if ($view->married == 0)
                            Single
                       @else ($view->married == 1) 
                            Married    
                    @endif
                    </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >Job</label>
                       <p>
                       {{$view -> job}}
                       </p>
                      </div>
                    </div>
                  </div>

                  
                  
          
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" >Salary</label>
                       <p>
                       {{$view -> salary}}
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" >Age</label>
                      @php
                            $birthday = $view->birthday;
                            $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y years');
                      @endphp
                      
                       <p>
                       {{$age}}
                       </p>
                      </div>
                    </div>
                  </div>
                   
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" >Address</label>
                        <p>
                       {{$view -> address}}
                       </p>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                      <label class="form-control-label" >LineID</label>
                        <p>{{$view -> LineID}}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" >Phone</label>
                        <p>{{$view -> phone}}
                        </p>
                  
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                      <label class="form-control-label" >Email</label>
                        <p>{{$view -> email}}
                        </p>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-2 ">
               
                </div>
                <hr class="my-4" />
                <!-- Description -->
                
                <h6 class="heading-small text-muted mb-4">คำขอกู้ วันที่ยอมรับ:{{$view -> dateAccept}}
                    
                </h6>
                
                <div class="pl-lg-4">
                    
                  <div class="form-group">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >จำนวนเงินที่ต้องโอน</label>
                       <p>
                       <H1 style=" color: green;">฿{{$view -> Money}}<H1>
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >จำนวนงวด</label>
                       <p>
                       {{$view -> instullment_request}}
                       </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-8">
                      <div class="form-group">
                      <label class="form-control-label" >โอนไปที่</label>
                       <p>
                       <h1> <img src="{{ url('/') }}/assets/uploadfile/bank/{{ $bank->imagebank }}" width='80px' height='80px'> 
                       {{$bank -> bankname}} </h1>
                       <h2> เลขที่บัญชี : {{$view -> 	IDBank}}</h2>
                       </p>
                       
                      </div>
                    </div>
                  
                  </div>
                  </div>
                  <div class="form-group">
                        <label for="image">หลักฐานการโอน</label>
                        <input style="	cursor:pointer;" type="file" name="receipt_slip" class="form-control">  
                        <p></p>
                        <div class="col-11 text-center">
                    <button type="submit" class="btn btn-md btn-success">ยืนยัน</button>
                    </div>
                    </div>
               
                  </div>
                </div>
            
              </form>
            </div>
          </div>
        </div>
      </div>



@endsection