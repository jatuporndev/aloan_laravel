@extends('dashboard.loaner.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
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
              ?>
          
          <div class="container-fluid mt--7">
          <div class="row justify-content-center">
              <div class="col-xl-6 order-xl-2">
                  <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                  <div class="col-9 text-center">
                                    <h2 class="mb-0">วงเงินและอัตราดอกเบี้ยของคุณ</h2>
                                  </div>
              
                            </div>
                         </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">วงเงินต่ำสุด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold money_minn text-center" >{{$databorrowlist -> money_min}}</p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">บาท</h3>
                                  </div>
                           </div>
                           
                           <div class="row">
                              <div class="col-6 col-md-4">
                                      <h3 class="card-title">วงเงินสูงสุด</h3>
                              </div>
                              <div class="col-6 col-md-4">
                              <p class="font-weight-bold money_maxx text-center" >{{$databorrowlist -> money_max}}</p>    
                           </div>
                           <div class="col-6 col-md-4 ">
                                      <h3 class="card-title text-center">บาท</h3>
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
                                                <form  action="{{ route('loaner.updateBorrowlist',['id' => $databorrowlist->borrowlistID]) }}" method="POST" autocomplete="off" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">วงเงินต่ำสุด</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_minn" name="money_min"  type="number" value="{{$databorrowlist -> money_min}}"> 
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
                                                              <input class="form-control money_maxx" name="money_max" type="number" value="{{$databorrowlist -> money_max}}"> 
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
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-right">ดอกเบี้ยรายปี</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control interestt"  name="interest" type="number" value="{{$databorrowlist -> interest}}"> 
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
                                                                    <h3 class="card-title col-md-13 col-form-label text-md-right">ดอกเบี้ยค่าปรับ</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control Interest_penaltyy" name="Interest_penalty"  type="number" value="{{$databorrowlist -> Interest_penalty}}">
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                              </div>
                                                              <span class="text-danger error-text Interest_penalty_error"></span>  
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
                    <th scope="col" class="sort" data-sort="completion">Completion</th>
            
                  </tr>
                </thead>
                <tbody class="list">

               
                  <tr>
                    <th scope="row">
                  
                    
                  
                    </th>
                    <td class="budget">
                    
                   
                     
                    </td>
                    <td>
               
                    </td>
                    <td>
                   
                    
                  
                    </td>
                    <td>
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
                                                <form  action="{{ route('loaner.updateBorrowlist',['id' => $databorrowlist->borrowlistID]) }}" method="POST" autocomplete="off" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">วงเงินต่ำสุด</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_minn" name="money_min"  type="number" value="{{$databorrowlist -> money_min}}"> 
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
                                                              <input class="form-control money_maxx" name="money_max" type="number" value="{{$databorrowlist -> money_max}}"> 
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
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-right">ดอกเบี้ยรายปี</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control interestt"  name="interest" type="number" value="{{$databorrowlist -> interest}}"> 
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
                                                                    <h3 class="card-title col-md-13 col-form-label text-md-right">ดอกเบี้ยค่าปรับ</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control Interest_penaltyy" name="Interest_penalty"  type="number" value="{{$databorrowlist -> Interest_penalty}}">
                                                              <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                              </div>
                                                              <span class="text-danger error-text Interest_penalty_error"></span>  
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
                    </td>
                    
                  </tr>
                
                  </tbody>
              </table>
            </div>
              <!-- Card footer -->
              <div class="card-footer py-4">
              
            </div> 
          </div>
        </div>
      </div>
</div>
</div>


















@endif
@endsection