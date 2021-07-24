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
                  <li class="breadcrumb-item active" aria-current="page">ผู้ให้กู้</li>
                  </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>

    <!-- Page content -->
    <div class="container-fluid mt--1">
    <form  action="{{ route('borrower.updateAccept',['id' =>$view->RequestID]) }}" method="POST" enctype="multipart/form-data" id="request">
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
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                  
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-6 col-md-4">
                     <h3 class="card-title">ชื่อ-นามสกุล</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center" style=" text-align: right;" >{{ $view->firstname}} {{ $view->lastname}}</p>    
                     </div>      
               </div>
               <div class="row">
                  <div class="col-6 col-md-4">
                     <h3 class="card-title">อีเมล</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center"  >{{ $view->email}}</p>    
                     </div>       
               </div>
               <div class="row">
                  <div class="col-6 col-md-4">
                     <h3 class="card-title">เบอร์โทรศัพท์</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center" >{{ $view->phone}}</p>    
                     </div>        
               </div>
               <div class="row">
                  <div class="col-6 col-md-4">
                     <h3 class="card-title">LineID</h3>
                   </div>
                    <div class="col-6 col-md-7">
                       <p class="font-weight-bold money_minn text-center"  >{{ $view->LineID}}</p>    
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
                                    <h2 class="mb-1 text-center">คำขอกู้ </h2>
                                    <h2 class="mb-0 text-center"> </h2>
                                  </div>
                             </div>
                         </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6 col-md-5">
                                      <h3 class="card-title">จำนวนเงินที่ส่งคำขอ</h3>
                              </div>
                              <div class="col-6 col-md-3">
                              <p class="font-weight-bold text-center" ></p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" >{{ $view->Money}} บาท</h3>
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-5">
                                      <h3 class="card-title" >จำนวนงวดที่ส่งคำขอ</h3>
                              </div>
                              <div class="col-6 col-md-3">
                              <p class="font-weight-bold text-center" ></p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" >{{ $view->instullment_request}} </h3>
                                   
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-5">
                                      <h3 class="card-title">จำนวนเงินที่ผู้กู้ยอมรับ</h3>
                              </div>
                              <div class="col-6 col-md-3">
                              <p class="font-weight-bold  text-center" ></p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h2 class="card-title text-center" style="color:#33BC40;">{{ $view->money_confirm}} บาท</h2>
                                    
                                  </div>
                           </div>

                           <div class="row">
                              <div class="col-6 col-md-5">
                                      <h3 class="card-title">จำนวนงวดที่ผู้กู้ยอมรับ</h3>
                              </div>
                              <div class="col-6 col-md-3">
                              <p class="font-weight-bold  text-center" ></p>  
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h2 class="card-title text-center" style="color:#33BC40;" >{{ $view->instullment_confirm}}</h2>
                                  </div>
                           </div>
                           <p>&emsp;</p> 
                         <p style="color:#FF612F;" >&emsp;*เมื่อกดยอมรับแล้ว รายการอื่นจะถูกยกเลิกทันที โปรดตรวจสอบให้แน่ใจว่าที่คุณเลือกถูกต้อง</p> 
                    
                         
                        
                           <div class="text-center">
                      <button type="submit" class="btn btn-warning" name="UnAccept" style="background-color:#FF0000">
                            ยกเลิก
                      </button>
                      <button type="submit" class="btn btn-success" name="Accept" style="background-color:#33BC40">
                            ยอมรับ
                      </button>
                      </div>
                      
                  </div>
               </div>
            </div>
      </div>
</from>
      </div>
      <!-- EndBorrowlist -->
                   
      <!-- EndCriterion -->

      
              <!-- Request -->
            
      <!-- EndCriterion -->
@endsection