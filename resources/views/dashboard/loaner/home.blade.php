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
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>

               <!-- php ------------------------------- -->
          <?php $i = Auth::guard('loaner')->user()->setborrowlist ;
                $id =Auth::guard('loaner')->user()->LoanerID ;
              
              ?>
        <!--  don't touch this -->
          @if( $i=== 0)
          <script>window.location = "loaner/addborrowlist/{{$id}}";</script>
          @endif
        <!-- -->
          @if( $i=== 1)
          <?php $sql="SELECT *  FROM borrowlist WHERE LoanerID = $id" ;
                $databorrowlist=DB::select($sql)[0];

                $sql2="SELECT *  FROM criterion WHERE borrowlistID = $databorrowlist->borrowlistID";
                $datacriterion=DB::select($sql2);


                $arrayAge=["18-28 ปี","29-39 ปี","40-50 ปี","51ปีขึ้นไป"];
                $arrayMarri=["โสด","แต่งงานแล้ว"];
                $arraySalary=["0-9000","9000-15000","15000-50000","มากกว่า5หมื่น"];
                
              ?>
          
          <div class="container-fluid mt--7">
          <div class="row justify-content-center">
              <div class="col-xl-6 order-xl-2">
                  <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                  <div class="col-9 text-center">
                                    <h2 class="mb-0">วงเงินและอัตราดอกเบี้ยของคุณ </h2>
                                  </div>
                                  <label class="custom-toggle">
                                    <input type="checkbox" checked>
                                      <span class="custom-toggle-slider rounded-circle" data-label-off="ปิด" data-label-on="เปิด"></span>
                                  </label>
                             </div>
                   
                             <!-- @if( $databorrowlist -> status==0 )
                             <a class="text-right"  href="{{ route('loaner.setpublic',['id' =>$id,'status'=>1]) }}"> <i class="ni ni-planet text-orange"></i>  ปิดอยู่</a>
                             @elseif($databorrowlist -> status==1)
                             <a class="text-right"   href="{{ route('loaner.setpublic',['id' =>$id,'status'=>0]) }}"> <i class="ni ni-planet text-orange"></i>  เปิดอยู่</a> -->
     
                             @endif
                         </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title" style="color:red">วงเงินต่ำสุด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold money_minn text-center" style="color:red">{{$databorrowlist -> money_min}}</p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" style="color:red">บาท</h3>
                                  </div>
                           </div>
                           
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title" style="color:green">วงเงินสูงสุด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold money_maxx text-center" style="color:green">{{$databorrowlist -> money_max}}</p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center" style="color:green">บาท</h3>
                                  </div>
                           </div>

                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">ดอกเบี้ยรายปี</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold interestt text-center" >{{$databorrowlist -> interest}}</p>  
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">%</h3>
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">ดอกเบี้ยค่าปรับ</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold Interest_penaltyy text-center" >{{$databorrowlist -> Interest_penalty }}</p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">%</h3>
                                  </div>
                           </div>
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">จำนวนงวด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold instullment_maxx text-center" >{{$databorrowlist -> instullment_max }}</p>   
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">เดือน</h3>
                                  </div>
                           </div>
                      <!-- Button trigger modal -->
                      <div class="text-right">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            แก้ไข
                      </button></div>

                      <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title " id="exampleModalLabel">แก้ไขวงเงินและอัตราดอกเบี้ย</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form  action="{{ route('loaner.updateBorrowlist',['id' => $databorrowlist->borrowlistID]) }}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">วงเงินต่ำสุด</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_minn text-center" name="money_min"  type="number" min="1" value="{{$databorrowlist -> money_min}}"> 
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">บาท</span>
                                                              </div>
                                                              <span class="text-danger error-text money_min_error"></span>
                                                              </div>   
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">วงเงินสูงสุด</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_maxx text-center" name="money_max" type="number" min="1"  value="{{$databorrowlist -> money_max}}"> 
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">บาท</span>
                                                              </div>
                                                              <span class="text-danger error-text money_max_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-center">ดอกเบี้ยรายปี</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control interestt text-center"  name="interest" type="number" min="1" max="15" value="{{$databorrowlist -> interest}}"> 
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                              </div>
                                                              <span class="text-danger error-text interest_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-13 col-form-label text-md-center">ดอกเบี้ยค่าปรับ</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control Interest_penaltyy text-center" name="Interest_penalty"  type="number" min="1" max="15"  value="{{$databorrowlist -> Interest_penalty}}">
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                              </div>
                                                              <span class="text-danger error-text Interest_penalty_error"></span>  
                                                            </div>   
                                                          </div> 
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-13 col-form-label text-md-center">จำนวนงวด</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control instullment_maxx text-center" name="instullment_max"  type="number" min="1" max="24" value="{{$databorrowlist -> instullment_max}}">
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">เดือน</span>
                                                              </div>
                                                              <span class="text-danger error-text instullment_max_error"></span>  
                                                            </div>   
                                                          </div> 
                                                      </div>
                                                  
                                    
                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
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

      <!-- <table> -->

      <div class="container-fluid mt--1">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0 text-center">เกณฑ์การให้กู้ของคุณ</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    
                    <th scope="col" class="sort" >ช่วงอายุ</th>
                    <th scope="col" class="sort" >สถานภาพ</th>
                    <th scope="col" class="sort" >ช่วงเงินเดือน</th>
                    <th scope="col" class="sort" >วงเงินสูงสุดที่ให้กู้</th>
                    <th scope="col" class="sort" >งวดสูงสุด</th>
                    <th scope="col" class="sort" data-sort="completion">Action</th>
            
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($datacriterion as $item)
                
                  <tr>
               
                    <th scope="row">
                  
              
                    {{$arrayAge[$item->Age_range]}}
                  
                    </th>
                    <td class="budget">
                    
                    {{$arrayMarri[$item->Married]}}
                     
                    </td>
                    <td>
                    {{$arraySalary[$item->Saraly_range]}}
                    </td>
                    <td>
                   
                    {{$item->money_max }}
                  
                    </td>
                    <td>
                  
                   {{$item->instullment_max}}
                
                   </td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#criModal{{$item->criterionID}}">
                            แก้ไข
                      </button>
              </div>
                    </td>
                     <!-- Modal -->
            <div class="modal fade" id="criModal{{$item->criterionID}}" tabindex="-1" role="dialog" aria-labelledby="criModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title " id="criModalLabel">แก้ไขเกณฑ์</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                              <div class="modal-body">
                                                <form  action="{{ route('loaner.updateCriterion',['id' => $item->criterionID]) }}" method="POST" enctype="multipart/form-data" id="UpdateCri">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                                    <h3><label class="card-title col-md-11 col-form-label text-md-center">ช่วงอายุ</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control text-center" type="text" value="{{$arrayAge[$item->Age_range]}}" disabled="disabled"> 
                                                               </div>     
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                                    <h3><label class="card-title col-md-11 col-form-label text-md-center">สถานภาพ</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control text-center" type="text" value="{{$arrayMarri[$item->Married]}}" disabled="disabled"> 
                                                               </div>     
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-11 col-form-label text-md-center">ช่วงเงินเดือน</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control text-center" type="text" value="{{$arraySalary[$item->Saraly_range]}}" disabled="disabled"> 
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">บาท</span>
                                                              </div>
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-12 col-form-label text-md-center">วงเงินสูงสุดที่ให้กู้</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_maxx text-center" name="money_max" type="number" min="1" max="{{$databorrowlist -> money_max}}" value="{{$item->money_max}}"> 
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">บาท</span>
                                                              </div>
                                                              <span class="text-danger error-text money_max_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-11 col-form-label text-md-center">งวดสูงสุด</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control instullment_maxx text-center" name="instullment_max" type="number" min="1" max="{{$databorrowlist -> instullment_max}}" value="{{$item->instullment_max}}"> 
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">เดือน</span>
                                                              </div>
                                                              <span class="text-danger error-text instullment_max_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                  
                                    
                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                                </div>
                                                </form>
                                            </div>
                                </div>
                          </div>
                    </div>

<!--End Modal -->
                  </tr>
                  
                  @endforeach
                  </tbody>
              </table>
            </div>
             
          </div>
        </div>
      </div>
</div>


           














@endif
@endsection