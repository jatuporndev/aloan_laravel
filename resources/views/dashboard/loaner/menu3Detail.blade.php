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
                  <li class="breadcrumb-item"><a href="{{ route('loaner.menu3') }}">รอชำระ</a></li>
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
                  <h2 class="mb-0">#{{$view -> BorrowerID}} ตรวจสอบข้อมูลผู้กู้ คุณ {{$view -> firstname}} {{$view -> lastname}} </h2>
                </div>
              </div>
            </div>
            <div class="card-body">
      
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
                       {{$view -> salary}} บาท
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
                        <p>
                        {{$view -> LineID}}
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
                    <div class="col-lg-6">
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
                <h6 class="heading-small text-muted mb-4">คำขอกู้ วันที่ยอมรับ:{{$view -> date_start}}</h6>
                <div class="pl-lg-4">  
                  <div class="form-group">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">เงินต้น</label>
                       <p>
                       ฿ {{$view -> Principle}}
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >จำนวนงวด</label>
                       <p>
                       {{$view -> instullment_total}}
                       </p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >ดอกเบี้ย</label>
                       <p>
                       {{$view -> Interest}} %
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >ดอกเบี้ยค่าปรับ</label>
                       <p>
                       {{$view -> Interest_penalty}} %
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">ยอดทั้งหมด</label>
                       <p>
                       ฿ {{$view -> total}}
                       </p>
                      </div>
                    </div>
                  </div>
                
                  <div class="form-group">
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">เงินคงเหลือชำระ</label>
                       <p style="color:orange;">
                      ฿ {{$view -> remain}}
                       </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" >จำนวนงวดคงเหลือ</label>
                       <p style="color:orange;">
                       {{$view -> instullment_Amount}} เดือน
                       </p>
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  
                  <hr class="my-4" />
                  <!-- Code PHP-->
                  <?php
                      $BorrowDetailID = $view->BorrowDetailID;
                      $sql="SELECT * FROM historydetailbill 
                      WHERE 1 AND  BorrowDetailID = $BorrowDetailID";
                      $dataBill = DB::select($sql);
                  ?>
                  <!-- End Code PHP-->
                  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">
                          <div class="card-header border-0">
                              <h3 class="mb-0">รายการชำระ: </h3>
                          </div> 
                    </div>
                    
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
               
                  <tr>
                    <th scope="col" class="sort" >รหัส</th>
                    <th scope="col" class="sort" >ยอดทั้งหมด</th>
                    <th scope="col" class="sort" >วันที่</th>
                    <th scope="col" class="sort" >สถานะ</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($dataBill as $bill)
                 
                  <tr>
                    <th scope="row">
                  
                    {{$bill-> historyDetailID}}
                  
                    </th>
                    <td class="budget">
                    
                    ฿{{$bill-> money_total}}
                     
                    </td>
                    <td>
                    {{$bill-> datepaying}}
                    </td>
                    <td>
                    @if($bill-> status == 0)
                    <span class="viewpass" style="color: orange;">รอยืนยัน</span>
                    @elseif($bill-> status == 1)
                    <span class="viewpass" style>ยืนยันแล้ว</span>
                    @elseif($bill-> status == 2)
                    <span class="viewpass" style="color: red;">ยกเลิก</span>
                    @endif
                    </td>
                    <td>
                    @if($bill-> status == 2)
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa{{$bill->historyDetailID}}">
                            ตรวจสอบ
                      </button>
                    @else
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aa{{$bill->historyDetailID}}">
                            ตรวจสอบ
                      </button>
                      @endif
                    </td>
                    <div class="modal fade" id="aa{{$bill->historyDetailID}}" tabindex="-1" role="dialog" aria-labelledby="criModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title " id="criModalLabel">ใบเสร็จยืนยัน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                
                                <!-- Code PHP-->
                                <?php
                                 $sql="SELECT * FROM historydetailbill WHERE historyDetailID = $bill->historyDetailID";
                                 $data1 = DB::Select($sql)[0];
                         
                                 date_default_timezone_set('Asia/Bangkok');
                                 $datenow = date($data1->datepaying);
                                 $sql="SELECT history.*, IF(settlement_date < '$datenow', '1', '0') as dateset_status,
                                 ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as moneySet,
                                 ROUND(( ((borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total*(borrowdetail.Interest_penalty/100)) ),2) as interest_penalty_money
                                 FROM history 
                                 INNER JOIN borrowdetail ON borrowdetail.BorrowDetailID = history.BorrowDetailID 
                                 WHERE  history.historyDetailID = $bill->historyDetailID ";
                                 $datahistory = DB::select($sql);
                                 $i =1;
                                ?>
                                <!-- End Code PHP-->

                                              <div class="modal-body">
                                                <form  action="{{ route('loaner.confrimBill',['historyDetailID' => $bill->historyDetailID]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                
                                                @foreach($datahistory as $itembill)
                                                
                                                <div class="row">
                                                          <div class="col-lg-5">
                                                              <h3><label class="card-title col-md-11 col-form-label text-md-center">งวดชำระที่ {{$i}}</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group"> 
                                                              <div class="form-control text-center">
                                                                <span>รหัส {{$itembill-> HistoryID}}</span>
                                                                <span>งวดที่ {{$itembill-> settlement_date}}</span> 
                                                              </div>
                                                            </div>     
                                                          </div>   
                                                  </div>
                                                          <?php $i=$i+1; ?>
                                                @endforeach
                        
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                             <h3><label class="card-title col-md-11 col-form-label text-md-center">วันที่ชำระ</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <span class="form-control text-center" type="text" >{{$bill-> datepaying}}</span>
                                                               </div>     
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                             <h3><label class="card-title col-md-11 col-form-label text-md-center">ยอดชำระ</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <span class="form-control text-center" type="text" >฿ {{$bill-> money}}</span>
                                                               </div>     
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-11 col-form-label text-md-center">ค่าปรับ</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <span class="form-control text-center" type="text" >฿ {{($bill-> money_total) - ($bill-> money)}}</span>
                                
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-12 col-form-label text-md-center">ยอดชำระรวม</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <span class="form-control text-center" type="text" >฿ {{$bill-> money_total}}</span>
                                                              </div>   
                                                            </div>     
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-11 col-form-label text-md-center">ใบเสร็จยืนยัน</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <img src="{{ url('/') }}/assets/uploadfile/Borrower/payment/{{$bill-> imageBill}}" width='250px' height='400px'>
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                  
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            @if($bill -> status ==0)
                                            <button type="submit" formaction="{{ route('loaner.cancleBill',['historyDetailID' => $bill->historyDetailID]) }}" class="btn btn-danger">ยกเลิก</button>
                                            <button type="submit"  class="btn btn-primary">ยืนยัน</button>
                                            @endif
                                                </div>
                                                </form>
                                            </div>
                                </div>
                          </div>
                    </div>
                  </tr>
                @endforeach
                  </tbody>
              </table>
                    </div>
                  </div>
                  </div>
                </div>   
            </div>
          </div>
        </div>
      


@endsection