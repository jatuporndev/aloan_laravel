
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
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}">คำขอกู้</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ตรวจสอบ</li>
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
             
                  </div>

                  
                  <div class="row">
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
                  <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal1">ประวัติการกู้</a>
                
                </div>
                <hr class="my-4" />
                <!-- Description -->
                
                <h6 class="heading-small text-muted mb-4">คำขอกู้
                    
                </h6>
                
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
                    <div class="col-lg-6">
              
                      <div class="form-group">
                      <input type="button" data-toggle="modal" data-target="#unpass{{$view->RequestID}}" style="border-radius: 8px; background-color: #f44336;  color: white; padding: 15px 32px;"  value="ไม่ผ่าน">
                      <input type="submit"  style="border-radius: 8px; background-color: #4CAF50; color: white; padding: 15px 32px;" value="ผ่าน">
                      </div>
                      
                    </div>
                </div>
               
                  </div>
                </div>
            
              </form>
            </div>
          </div>
        </div>
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
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title " id="exampleModalLabel">เหตุผล</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form  action="{{ route('loaner.updateUnpass',['id' => $view->RequestID]) }}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                                                 

                                                    <div class="w3-container">
                                                      <h2>ประวัติการกู้</h2>
                                                      <table style="border: 1px solid black;" class="w3-table w3-striped">
                                                @foreach($datahis as $item)
                                              
                                                      
                                                        <tr>
                                                          <td>
                                                          <div class="pl-3 email">
                                                          <p>รหัส{{$item->BorrowDetailID}}</p>
                                                          <span> ผู้ให้กู้ {{$item->firstname}} {{$item->lastname}}<span>
                                                            <span>จำนวนเงิน: {{$item->Principle}}</span>
                                                            <span>จำนวนงวด: {{$item->instullment_total}} </span>
                                                            <p>เริ่มเมื่อ{{$item->date_start}}</p>
                                                          </p>
                                                        
                                                          </div>
                                                          </td>
                                                          <td></td>
                                                          <td>
                                                            @if($item->Status==0)
                                                            <span style="color : orange;"> อยู่ระหว่างการกู้</span>
                                                            @elseif($item->Status==1)
                                                            <span style="color : green;"> สำเร็จ</span>
                                                            @endif
                                                        </td>
                                                        
                                                        </tr>
                                                        @endforeach
                                                      </table>
                                                    </div>

                                                  
                                                

                                                
                                                
                                                
                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            
                                                </div>
                                                </form>
                                            </div>
                                </div>
                          </div>
                    </div>
                     
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
                                                <form  action="{{route('loaner.updateUnpass',['id' => $view->RequestID])}}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                <textarea style="width:250px;height:150px;" name="comment"></textarea>
                                    
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