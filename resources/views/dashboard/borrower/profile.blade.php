@extends('dashboard.borrower.dashboardlayout')

@section('content')
<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);"> 
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
                    <img alt="Image placeholder" src="{{ url('/') }}/assets/uploadfile/Borrower/profile/{{ Auth::guard('borrower')->user()->imageProfile }}" class="borrower_picture">
                  </span> 
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold" style="color:white">{{ Auth::guard('borrower')->user()->firstname }}</span>
                  </div>
                </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-4" style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);">
<div class="header pb-4"  style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);"> 
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">ข้อมูลโปรไฟล์</h6>
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
            
<!-- Page content -->
<div class="container-fluid mt--5">
  <form  action="{{ route('borrower.borrowerUpdateInfo') }}" method="POST" enctype="multipart/form-data" id="UpdateInfo">
  @csrf
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
            <input type="file" name="borrower_image" id="borrower_image" style="opacity:0;height:1px;display:none"> 
            <a href="javascript:void(0)" id="change_picture_btn">
                <div class="card-profile-image">
                    <img src="{{ url('/') }}/assets/uploadfile/Borrower/profile/{{ Auth::guard('borrower')->user()->imageProfile }}" class="rounded-circle borrower_picture">
                </div>
            </a>      
            </div>
            <div class="card-body pt-6 text-center">
              <h3 class="card-title">{{ Auth::guard('borrower')->user()->firstname }} {{ Auth::guard('borrower')->user()->lastname }}</h3>
              <p class="card-text phonee">{{ Auth::guard('borrower')->user()->phone }}</p>
              <p class="card-text LineIDD">{{ Auth::guard('borrower')->user()->LineID }}</p>
              </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile</h3>
                </div>
                <div class="col-4 text-right">
                  <button type="submit" class="btn btn-md btn-success">บันทึก</button>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Email address</label>
                        <input type="email" name="email" class="form-control emaill" value="{{ Auth::guard('borrower')->user()->email }}">
                      </div>
                      <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Relationship Status</label>
                                <select class="form-control" name="married" id="married">
                                <option value="0"{{ Auth::guard('borrower')->user()->married =="0" ? 'selected' : ''}}>โสด</option>
                                <option value="1"{{ Auth::guard('borrower')->user()->married =="1" ? 'selected' : ''}}>แต่งงานแล้ว</option>
                                </select>
                              </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Salary</label>
                        <input type="number" min="0" name="salary" class="form-control" value="{{ Auth::guard('borrower')->user()->salary }}">
                        <span class="text-danger error-text salary_error"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Job</label>
                        <input type="text" name="job" class="form-control"  value="{{ Auth::guard('borrower')->user()->job }}">
                      </div>
                      <span class="text-danger error-text job_error"></span>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-control-label">Phone</label>
                        <input type="text" name="phone" class="form-control phonee" value="{{ Auth::guard('borrower')->user()->phone }}">
                      </div>
                      <span class="text-danger error-text phone_error"></span>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-control-label">LineID</label>
                        <input type="text" name="LineID" class="form-control" value="{{ Auth::guard('borrower')->user()->LineID }}">
                      </div>
                      <span class="text-danger error-text LineID_error"></span>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <input type="text" name="address" class="form-control"  value="{{ Auth::guard('borrower')->user()->address}}">
                      </div>
                      <span class="text-danger error-text address_error"></span>
                    </div>
                    
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Bank information</h6>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-control-label">ธนาคาร</label>
                        <select class="form-control" name="bank" id="bank">
                          <?php   $post = DB::table('banklist')->get(); ?>
                          @foreach($post as $item)
                                <option value="{{$item->bankname}}" {{ Auth::guard('borrower')->user()->bank =="$item->bankname" ? 'selected' : ''}}>{{$item->bankname}}</option>
                          @endforeach
                                </select>
                                
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-control-label">เลขที่บัญชีธนาคาร</label>
                        <input type="text" name="IDBank" class="form-control" value="{{ Auth::guard('borrower')->user()->IDBank }}">
                      </div>
                      <span class="text-danger error-text IDBank_error"></span>
                    </div>
                   
                  </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  

@endsection