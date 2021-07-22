
@extends('dashboard.admin.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Borrower</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Borrower</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>
<?php 
    $sql="SELECT * FROM admins";
    $data = DB::select($sql);
?>

<!-- Page content -->
<div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Borrower table</h3>
            </div>
            <div style=" position: absolute;right: 0px;padding: 25px 10px;">   
                 <a data-toggle="modal" data-target="#add" button class="btn btn-info" style="color:#FFFFFF;"  type="button"> +add </a> 
                </div>
</br>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" >Email</th>
                    <th scope="col" class="sort" >Firstname Lastname</th>
                    <th scope="col" class="sort" >Phone</th>
                    <th scope="col" class="sort" >Adress</th>
             
                  </tr>
                </thead>
                <tbody class="list">

                  @foreach($data as $admin)
                  <tr>
                    <th scope="row">
                  
                {{$admin -> email}} 
                  
                    </th>
                    <td scope="row">
                    
                    {{$admin -> firstname}} {{$admin -> lastname}} 
                     
                    </td>
                    <td>
                    {{$admin -> phone}} 
                    </td>
                    <td  >
                   
                    {{$admin -> address}} 
                    
                    </td>
                    
                 
                  </tr>
                @endforeach
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


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="criModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title " id="criModalLabel">Add admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                                <form  action="{{ route('admin.create')}}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">ชื่อ</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_minn text-center" name="firstname"   > 
                                                             
                                                              <span class="text-danger error-text money_min_error"></span>
                                                              </div>   
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">นามสกุล</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_maxx text-center" name="lastname" > 
                                                              
                                                              <span class="text-danger error-text money_max_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-center">อีเมล</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control interestt text-center"  name="email"> 
                                                             
                                                              <span class="text-danger error-text interest_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-12 col-form-label text-md-center">รหัสผ่าน</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control interestt text-center" type="password"  name="password"> 
                                                             
                                                              <span class="text-danger error-text interest_error"></span> 
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-13 col-form-label text-md-center">เบอร์โทร</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control Interest_penaltyy text-center" name="phone"  >
                                                              
                                                              <span class="text-danger error-text Interest_penalty_error"></span>  
                                                            </div>   
                                                          </div> 
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-13 col-form-label text-md-center">ที่อยู่</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control instullment_maxx text-center" name="address" style="height:100px;">
                                                             
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




@endsection