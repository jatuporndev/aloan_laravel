
@extends('dashboard.admin.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Profile</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">profile</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
  <form  action="{{ route('admin.adminUpdateInfo') }}" method="POST" enctype="multipart/form-data" id="UpdateInfo">
  @csrf
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            
            <div class="card-body pt-4 text-center">
              <div class="row">
              <div class="col-8 col-md-6">
              <h3 class="card-title firstnamee text-right">{{ Auth::guard('admins')->user()->firstname }}</h3>
              </div>
              <h3 class="card-title lastnamee">{{ Auth::guard('admins')->user()->lastname }}</h3>
              </div>
           
             
              <p class="card-text phonee">{{ Auth::guard('admins')->user()->phone }}</p>
              
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
                        <input type="email" name="email" class="form-control emaill" value="{{ Auth::guard('admins')->user()->email }}">
                      </div>
                      <span class="text-danger error-text email_error"></span>
                    </div>
                 
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Firstname</label>
                        <input type="text"  name="firstname" class="form-control" value="{{ Auth::guard('admins')->user()->firstname }}">
                        <span class="text-danger error-text firstname_error"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Lastname</label>
                        <input type="text" name="lastname" class="form-control"  value="{{ Auth::guard('admins')->user()->lastname }}">
                      </div>
                      <span class="text-danger error-text lastname_error"></span>
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
                        <input type="text" name="phone" class="form-control phonee" value="{{ Auth::guard('admins')->user()->phone }}">
                      </div>
                      <span class="text-danger error-text phone_error"></span>
                    </div>
                    <div class="col-md-5">
                   
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <input type="text" name="address" class="form-control"  value="{{ Auth::guard('admins')->user()->address }}">
                      </div>
                      <span class="text-danger error-text address_error"></span>
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