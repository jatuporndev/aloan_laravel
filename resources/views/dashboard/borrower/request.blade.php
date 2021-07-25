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
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('borrower.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('borrower.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ผู้ให้กู้</li>
                  </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>

<?php
$BorrowerID = Auth::guard('borrower')->user()->BorrowerID;
    $sql="SELECT IFNULL((SELECT 'True' FROM pined WHERE BorrowerID =$BorrowerID AND borrowlistID =$view->borrowlistID), 'False') as pin";
    $pin=DB::select($sql)[0];   
?>


    <!-- Page content -->
    <div class="container-fluid mt--4">
     
    <form  action="{{ route('borrower.addRequest',['borrowlistID' =>$view->borrowlistID]) }}" method="POST" enctype="multipart/form-data" id="request">
              @csrf
      <div class="row justify-content-center">
    
        <div class="col-xl-7 order-xl-6">
          <div class="card card-profile">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                    <img src="{{ url('/') }}/assets/uploadfile/Loaner/profile/{{ $view->imageProfile }}" class="rounded-circle">
                </div>
              </div>
            </div>
            <div style=" position: absolute;right: 0px;padding: 25px 50px;">   
            @if($pin->pin =='False')
                 <a href="{{ route('borrower.addPin',['borrowerID' =>$BorrowerID , 'BorrowelistID' =>$view->borrowlistID]) }}" button class="btn btn-info" style="color:#FFFFFF;"  type="button">เพิ่มรายการโปรด</a> 
            @elseif($pin->pin=='True')
                 <a  href="{{ route('borrower.removePin',['borrowerID' =>$BorrowerID , 'BorrowelistID' =>$view->borrowlistID]) }}" button class="btn btn-danger" style="color:#FFFFFF;"  type="button">ลบรายการโปรด</a> 
            @endif
                </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              
              </div>
            </div>
            <div class="card-body pt-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                  
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-6 col-md-5">
                     <h3 class="card-title">ชื่อ-นามสกุล</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center">{{ $view->firstname}} {{ $view->lastname}}</p>    
                     </div>      
               </div>
               <div class="row">
                  <div class="col-6 col-md-5">
                     <h3 class="card-title">อีเมล</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center">{{ $view->email}}</p>    
                     </div>       
               </div>
               <div class="row">
                  <div class="col-6 col-md-5">
                     <h3 class="card-title">เบอร์โทรศัพท์</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center">{{ $view->phone}}</p>    
                     </div>        
               </div>
               <div class="row">
                  <div class="col-6 col-md-5">
                     <h3 class="card-title">LineID</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center">{{ $view->LineID}}</p>    
                     </div>
                         
               </div>
              
              </div>
            </div>
          </div>
        </div>
        </div>
        
        <!-- Borrowlist -->
        <div class="container-fluid mt--0">
          <div class="row justify-content-center">
              <div class="col-xl-7 order-xl-2">
                  <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                  <div class="col-9 col-md-11 text-center">
                                    <h2 class="mb-1 text-center">รายการ </h2>
                                    <h2 class="mb-0 text-center"> </h2>
                                  </div>
                             </div>
                         </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title" >วงเงินขั้นต่ำ</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold text-center" ></p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" >{{ $view->money_min}} บาท</h3>
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title" >วงเงินสูงสุด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold text-center" ></p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" >{{ $view->money_max}} บาท</h3>
                                   
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">จำนวนงวด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold  text-center" ></p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">{{ $view->instullment_max}} เดือน</h3>
                                    
                                  </div>
                           </div>

                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">ดอกเบี้ย(รายปี)</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold  text-center" ></p>  
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">{{ $view->interest}}%</h3>
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">ดอกเบี้ยค่าปรับ</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold text-center" ></p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" >{{ $view->Interest_penalty}}%</h3>
                                      <input type='hidden' name='Interest_penalty' value='{{$view->Interest_penalty}}' />
                                  </div>
                           </div>
                          
                  </div>
               </div>
            </div>
      </div>
      </div>
      <!-- EndBorrowlist -->
                      @php
                            $birthday = $view->birthday;
                            $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y');
                     @endphp

                     <?php
                        $arrayAge=["18-28 ปี","29-39 ปี","40-50 ปี","51ปีขึ้นไป"];
                        $arrayMarri=["โสด","แต่งงานแล้ว"];
                        $arraySalary=["0-9000","9000-15000","15000-50000","มากกว่า5หมื่น"];

                        $borrowerID =  Auth::guard('borrower')->user()->BorrowerID ;
                        $sqlborrower="SELECT * FROM borrowers WHERE BorrowerID = borrowerID";
                        $borrower=DB::select($sqlborrower)[0];  

                        $Married = $borrower->married;
                        $saraly =$borrower->salary;

                        if($age >=18 && $age <=28){
                          $Age_range = 0;
                        }else if($age >=29 && $age <=39){
                          $Age_range = 1;
                        }else if($age >=40 && $age <=50){
                          $Age_range = 2;
                        }else if($age >51){
                          $Age_range = 3;
                        }else{
                          $Age_range = 0;
                        }
                        
                        if($saraly >=0 && $saraly <=9000){
                          $Saraly_range = 0;
                        }else if($saraly >=9001 && $saraly <=15000){
                          $Saraly_range = 1;
                        }else if($saraly >=15001 && $saraly <=50000){
                          $Saraly_range = 2;
                        }else if($saraly >50001){
                          $Saraly_range = 3;
                        }else{
                          $Saraly_range = 0;
                        }

                        $sql="SELECT * FROM criterion WHERE borrowlistID =$view->borrowlistID AND
                        Age_range =$Age_range AND Saraly_range=$Saraly_range AND Married=$Married";

                        $checkCri=DB::select($sql)[0];  
                     ?>
   
              <!-- Criterion -->
              <div class="container-fluid mt--0">
          <div class="row justify-content-center">
              <div class="col-xl-7 order-xl-2">
                  <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                  <div class="col-9 col-md-11 text-center">
                                    <h2 class="mb-0 text-center">เกณฑ์ของคุณ </h2>
                                  </div>
                             </div>
                         </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title" >ช่วงอายุ :</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold text-center" ></p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" >{{$arrayAge[$checkCri->Age_range]}} </h3>
                                  </div>
                           </div>

                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title" >สถานภาพ :</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold text-center" ></p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" > {{$arrayMarri[$checkCri->	Married]}}</h3>
                                  </div>
                           </div>

                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">ช่วงเงินเดือน</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold  text-center" ></p>  
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">{{$arraySalary[$checkCri->Saraly_range]}} บาท</h3>
                                  </div>
                           </div>

                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">ดอกเบี้ย</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold  text-center" ></p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" >{{$checkCri->interest}} %</h3>
                                      <input type='hidden' name='Interest' value='{{$checkCri->interest}}' />
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">จำนวนงวดสูงสุด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold  text-center" ></p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">{{$checkCri->instullment_max}} เดือน</h3>
                                      <input type='hidden' name='instullment_max' value='{{$checkCri->instullment_max}}' />
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title"> วงเงินสูงสุดที่ให้กู้</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold text-center" ></p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">{{$checkCri->money_max}} บาท</h3>
                                      <input type='hidden' name='money_max' value='{{$checkCri->money_max}}' />
                                  </div>
                           </div>
                          
                  </div>
               </div>
            </div>
      </div>
      </div>
      <!-- EndCriterion -->

      
              <!-- Request -->
              <div class="container-fluid mt--0">
              
          <div class="row justify-content-center">
              <div class="col-xl-7 order-xl-2">
                  <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                  <div class="col-9 col-md-11 text-center">
                                    <h2 class="mb-0 text-center">คำขอกู้ </h2>
                                    
                                  </div>
                             </div>
                         </div>
                      <div class="card-body">
                      <div class="row">
                                <div class="col-lg-5">
                                   <div class="form-group">
                                       <h3 class="card-title col-md-12 col-form-label text-md-left">จำนวนเงินที่ต้องการกู้</h3>
                                          </div>
                                        </div>
                                    <div class="col-md-6">
                                         <div class="input-group">
                                             <input class="form-control  text-center" name="Money" type="number" min="1"  value=""> 
                                                <div class="input-group-append">
                                                 <span class="input-group-text">บาท</span>
                                                 </div>
                                                  <span class="text-danger error-text money_max_error"></span> 
                                               </div>   
                                 </div>    
                      </div> 
                      <div class="row">
                                <div class="col-lg-5">
                                   <div class="form-group">
                                       <h3 class="card-title col-md-12 col-form-label text-md-left">เลือกจำนวนงวด</h3>
                                          </div>
                                        </div>
                                    <div class="col-md-6">
                                         <div class="input-group">
                                             <input class="form-control  text-center" name="instullment" type="number" min="1"  value=""> 
                                                <div class="input-group-append">
                                                 <span class="input-group-text">เดือน</span>
                                                 </div>
                                                  <span class="text-danger error-text money_max_error"></span> 
                                               </div>   
                                          </div>    
                      </div>
                      <div class="text-center">
                      <button type="submit" class="btn btn-warning" style="background-color:#f05837">
                            ส่งคำขอ
                      </button>
                      </div>
                          
                  </div>
               </div>
            </div>
                      </form>
      </div>
      </div>
      <!-- EndCriterion -->
@endsection