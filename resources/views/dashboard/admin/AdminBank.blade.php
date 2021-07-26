
@extends('dashboard.admin.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Bank Manage</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Bank</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>
<link rel="stylesheet" href="assets/css/style.css" type="text/css">



<div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Bank Manage</h3>
            </div>
            <div style=" position: absolute;right: 0px;padding: 25px 50px;">   
                 <a data-toggle="modal" data-target="#add" button class="btn btn-info" style="color:#FFFFFF;"  type="button"> +add </a> 
                </div>

            <?php 
                    $post = DB::table('banklist')->get();
            ?>


<div class="pl-lg-0">
                <div class="table-responsive">
                <table class="table table-responsive-xl">
                <thead>
                  <tr>
                  <th><h3 class="mb-0">ธนาคาร</h3></th>              
                  </tr>
                  <br>
                  <br>
                </thead>
                <tbody class="list">
                          @foreach($post as $item)
						    <tr class="alert" role="alert">          
						      <td class="d-flex align-items-center">
                      <div class="img" style="background-image: url(/assets/uploadfile/bank/{{$item->imagebank}});">
                      </div>
                      <span>&nbsp;&nbsp;&nbsp;&nbsp;{{$item->bankname}} </span>
						      </td>
				

						      <td>
                           
				        	</td>
                  <td>
                           
				        	</td>
						    </tr>
                            @endforeach
                  </tbody>





                    </div>
                    </div>
                    </div>
                    </div>



                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="criModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title " id="criModalLabel">Add Bank</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                                <form  action="{{ route('admin.addBank')}}" method="POST" enctype="multipart/form-data" id="Update">
                                                @csrf
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">Bank</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input class="form-control money_minn text-center" name="title"> 
                                                             
                                                              <span class="text-danger error-text money_min_error"></span>
                                                              </div>   
                                                            </div>   
                                                      </div>
                                                   
                                                      <div class="row">
                                                          <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <h3 class="card-title col-md-11 col-form-label text-md-right">Image Bank</h3>
                                                                </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <input type="file" class="form-control text-center" name="image"> 
                                                             
                                                              <span class="text-danger error-text money_min_error"></span>
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