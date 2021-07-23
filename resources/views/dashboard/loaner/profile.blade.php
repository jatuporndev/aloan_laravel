@extends('dashboard.loaner.dashboardlayout')

@section('content')
<div class="header pb-4"  style="background-image: linear-gradient( 135deg, #81FBB8 10%, #28C76F 100%);"> 
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Loaner</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}">Dashboards</a></li>
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
<div class="container-fluid mt--7">
  <form  action="{{ route('loaner.loanerUpdateInfo') }}" method="POST" enctype="multipart/form-data" id="UpdateInfo">
  @csrf
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
            <input type="file" name="loaner_image" id="loaner_image" style="opacity:0;height:1px;display:none"> 
            <a href="javascript:void(0)" id="change_picture_btn">
                <div class="card-profile-image">
                    <img src="{{ url('/') }}/assets/uploadfile/Loaner/profile/{{ Auth::guard('loaner')->user()->imageProfile }}" class="rounded-circle loaner_picture">
                </div>
            </a>      
            </div>
            <div class="card-body pt-6 text-center">
              <h3 class="card-title">{{ Auth::guard('loaner')->user()->firstname }} {{ Auth::guard('loaner')->user()->lastname }}</h3>
              <p class="card-text phonee">{{ Auth::guard('loaner')->user()->phone }}</p>
              <p class="card-text LineIDD">{{ Auth::guard('loaner')->user()->LineID }}</p>
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
                        <input type="email" name="email" class="form-control emaill" value="{{ Auth::guard('loaner')->user()->email }}">
                      </div>
                      <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Relationship Status</label>
                                <select class="form-control" name="married" id="married">
                                <option value="0"{{ Auth::guard('loaner')->user()->married =="0" ? 'selected' : ''}}>โสด</option>
                                <option value="1"{{ Auth::guard('loaner')->user()->married =="1" ? 'selected' : ''}}>แต่งงานแล้ว</option>
                                </select>
                              </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Job</label>
                        <input type="text" name="job" class="form-control"  value="{{ Auth::guard('loaner')->user()->job }}">
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
                        <input type="text" name="phone" class="form-control phonee" value="{{ Auth::guard('loaner')->user()->phone }}">
                      </div>
                      <span class="text-danger error-text phone_error"></span>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-control-label">LineID</label>
                        <input type="text" name="LineID" class="form-control" value="{{ Auth::guard('loaner')->user()->LineID }}">
                      </div>
                      <span class="text-danger error-text LineID_error"></span>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <input type="text" name="address" class="form-control"  value="{{ Auth::guard('loaner')->user()->address}}">
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
                                <option value="ธนาคารกรุงเทพ"{{ Auth::guard('loaner')->user()->bank =="ธนาคารกรุงเทพ" ? 'selected' : ''}}>ธนาคารกรุงเทพ</option>
                                <option value="ธนาคารกสิกรไทย"{{ Auth::guard('loaner')->user()->bank =="ธนาคารกสิกรไทย" ? 'selected' : ''}}>ธนาคารกสิกรไทย</option>
                                </select>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-control-label">เลขที่บัญชีธนาคาร</label>
                        <input type="text" name="IDBank" class="form-control" value="{{ Auth::guard('loaner')->user()->IDBank }}">
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