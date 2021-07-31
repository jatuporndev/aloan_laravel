
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
                  <li class="breadcrumb-item"><a href="{{ route('loaner.menu') }}">คำขอกู้</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ผู้กู้</li>
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
      <div class="row justify-content-center">
       
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">#{{$view -> BorrowerID}} ตรวจสอบข้อมูลผู้กู้ คุณ{{$view -> firstname}} {{$view -> lastname}}</h3>
                </div>
                <div class="col-4 text-right">
                <a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal1">ประวัติการกู้</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <form  action="{{ route('loaner.updatePass',['id' => $view->RequestID]) }}" method="POST" enctype="multipart/form-data">
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
  
                <hr class="my-4" />
                <!-- Description -->
                
                <h6 class="heading-small text-muted mb-4">คำขอกู้</h6>
                
                <div class="pl-lg-4">
                    
                  <div class="form-group">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >จำนวนเงิน</label>
                       <p>
                       {{$view -> Money}}
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
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >จำนวนเงินที่ยอมรับ</label>
                      <input type="text" id="fname" name="money_confirm" value="{{$view -> Money}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >จำนวนงวดที่ยอมรับ</label>
                      <input type="text" id="fname" name="instullment_confirm" value="{{$view -> instullment_request}}">
                      </div>
                    </div>
                    </div>
                    <hr class="my-4" />
                    
                    <div class="text-right">
                      <input type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#unpass{{$view->RequestID}}" value="ไม่ผ่าน">
                      <input type="submit" class="btn btn-md btn-success"  value="ผ่าน">  
                  </div>
                
                </div>
            
              </form>
              
            </div>
          </div>
        </div>
      </div>

      </div>
                      

      <?php
    $borrowerID = $view->	BorrowerID;
    $sql="SELECT loaners.*,borrowdetail.* FROM borrowdetail 
    INNER JOIN borrowlist ON borrowlist.borrowlistID = borrowdetail.borrowlistID
    INNER JOIN loaners ON loaners.LoanerID =borrowlist.LoanerID
      WHERE borrowdetail.BorrowerID = $borrowerID ";
      $datahis = DB::select($sql); 
    ?>

  

      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content col-12 col-xl-12">
                                              <div class="modal-header">
                                                  <h5 class="modal-title " id="exampleModalLabel">เหตุผล</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form  action="{{ route('loaner.updateUnpass',['id' => $view->RequestID]) }}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                
                                                <div class="card-header">
                                                    <h3 class="mb-0">ประวัติการกู้</h3>
                                                </div>
                                                <div class="col-lg-15">
                                                    <div class="table-responsive">
                                                      <table  class="table align-items-center table-flush">
                                                      <thead class="thead-light">
                                                
                                              
                                                        <tr>
                                                        <th scope="col" class="sort" >รหัส</th>
                                                        <th scope="col" class="sort" >ผู้ให้กู้</th>
                                                        <th scope="col" class="sort" >จำนวนเงิน</th>
                                                        <th scope="col" class="sort" >จำนวนงวด</th>
                                                        <th scope="col" class="sort" >เริ่มเมื่อ</th>
                                                        <th scope="col" class="sort" >ยอดคงเหลือ</th>
                                                        <th scope="col" class="sort" >งวดคงเหลือ</th>
                                                        <th scope="col" class="sort" >สถานะ</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                        @foreach($datahis as $item)
                                                          <tr>
                                                          <th scope="row">
                                                          {{$item->BorrowDetailID}}
                                                          </th>
                                                          <td class="budget">
                                                          {{$item->firstname}} {{$item->lastname}}
                                                          </td>
                                                          <td>
                                                          {{$item->Principle}}
                                                          </td>
                                                          <td>
                                                          {{$item->instullment_total}}
                                                          </td>
                                                          <td>
                                                          {{$item->date_start}}
                                                          </td>
                                                          <td>
                                                            @if($item->instullment_total == 0)
                                                          0
                                                          @else
                                                          {{$item->remain}}
                                                          @endif
                                                          </td>
                                                          <td>
                                                          {{$item->instullment_Amount}}
                                                          </td>
                                                          </p>
                                                          <td>
                                                            @if($item->Status==0)
                                                            <span style="color : orange;">อยู่ระหว่างการกู้</span>
                                                            @elseif($item->Status==1)
                                                            <span style="color : green;">สำเร็จ</span>
                                                            @endif
                                                        </td>

                                                              </tr>
                                                        @endforeach
                                                        </tbody>
                                                      </table>
                                                    </div>
                                                    </div>  
                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            
                                                </div>
                                                </form>
                                            </div>
                                </div>
                          </div>
                    </div>
                     
            
      <div class="modal fade" id="unpass{{$view->RequestID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title " id="exampleModalLabel">เหตุผล</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form  action="{{route('loaner.updateUnpass',['id' => $view->RequestID])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                          <div class="col-lg-5">
                                                                    <h4><label class="card-title col-md-11 col-form-label text-md-center">สาเหตุเพราะ</label></h4> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group"> 
                                                              <textarea class="form-control" name="comment"></textarea>
                                                               </div>     
                                                            </div>   
                                                      </div>
                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                </div>
                                                
                                                </form>
                                            </div>
                                </div>
                          </div>
                    </div>
                     



@endsection