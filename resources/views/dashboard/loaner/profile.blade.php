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
              <h6 class="h2 text-white d-inline-block mb-0">ข้อมูลโปรไฟล์ </h6>
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
<div class="container-fluid mt--4">
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
                </form>
                <!-- Description -->
                <div class="row align-items-center">
                <div class="col-8">
                <h6 class="heading-small text-muted mb-4">Bank information</h6>
                </div>
                <div class="col-4 text-right">
                  <button type="button" class="btn btn- btn-primary" data-toggle="modal" data-target="#exampleModal">เพิ่มบัญชี</button>
                </div>
              </div>
              <p></p>
                <div class="pl-lg-0">
                <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" >ชื่อผู้ถือบัญชี</th>
                    <th scope="col" class="sort" >เลขที่บัญชีธนาคาร</th>
                    <th scope="col" class="sort" >ธนาคาร</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
            <?php 
            $LoanerID =  Auth::guard('loaner')->user()->LoanerID ; 
            $sql="SELECT * FROM loaner_bank 
            INNER JOIN banklist ON loaner_bank.banklistID = banklist.banklistID
            WHERE LoanerID =$LoanerID ORDER BY bankID ";
         
            $post=DB::select($sql); 
              ?>
              
              @foreach($post as $item)
                  <tr>
                    <td>
                    {{ $item->holderName }}         
                    </td>

                    <td>             
                    {{ $item->bankNumber }}                     
                    </td>
                    
                    <td>
                    {{ $item->bank }} 
               
                    </td>
                    <td>
                    <form action="{{ route('loaner.deleteBank',['bankID' => $item->bankID]) }}" method="POST">
                    @csrf
                    <button   data-method="delete" button class="btn btn-danger" style="color:#FFFFFF;" type="summit">x</button >   
                    </form>
                    </td>
                    
                  </tr>
                @endforeach
                  </tbody>
              </table>
            </div>
                 
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title " id="exampleModalLabel">เพิ่มบัญชีธนาคาร</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form  action="{{ route('loaner.addBank',['LoanerID' => Auth::guard('loaner')->user()->LoanerID]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-center">ธนาคาร</h3>
                                                                </div>
                                                          </div>

                                                            <!-- php  -->
                                                                <?php 
                                                                $sql = "SELECT * FROM banklist";
                                                                $post=DB::select($sql);
                                                                  ?>
                                                            <!-- end php  -->

                                                          <div class="col-md-6">
                                                          <div class="form-group">
                                                            <select id="comboA" onchange="getComboA(this)" type="text"  class="form-control" name="bank" placeholder="Enter Bank" value="{{ old('bank') }}">
                                                              @foreach($post as $item)
                                                                    <option value="{{$item -> bankname}}">{{$item -> bankname}}</option>
                                                              @endforeach
                                                            </select>
                                                          </div>   
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-left">เลขที่บัญชีธนาคาร</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control  text-center" name="bankNumber" type="text" value=""> 
                                                              <span class="text-danger error-text money_max_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-center">ชื่อบัญชี</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control  text-center"  name="holderName" type="text"  value=""> 
                                                            
                                                              <span class="text-danger error-text interest_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      
                                                    
                                                  
                                    
                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-success">บันทึก</button>
                                                </div>
                                                </form>
                                            </div>
                                </div>
                          </div>
                    </div>
                   
                  </div>
                </div>
              
            
        

@endsection