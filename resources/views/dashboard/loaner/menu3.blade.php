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
              <h6 class="h2 text-white d-inline-block mb-0">รายการ</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">รอชำระ</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>
<link rel="stylesheet" href="assets/css/style.css" type="text/css">


    <?php
    $loanerID = Auth::guard('loaner')->user()->LoanerID;
    $sql="SELECT *,ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as perints,
          IFNULL((SELECT settlement_date FROM history  WHERE BorrowDetailID = borrowdetail.BorrowDetailID AND status =0 LIMIT 1), 'ไม่มี')   as settlement_date ,
    (SELECT 'True' FROM history WHERE BorrowDetailID = borrowdetail.BorrowDetailID  AND status = 1 LIMIT 1) as checkpay
    
  
     FROM borrowdetail 
    INNER JOIN Borrowers ON borrowdetail.BorrowerID = Borrowers.BorrowerID
    INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
    WHERE 1 AND borrowlist.LoanerID = $loanerID AND borrowdetail.status =0";
        $post = DB::select($sql); 
    ?>

		<div class="container-fluid mt--4">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-xl">
						  <thead>
						    <tr>
						    	<th>ผู้กู้ที่รอชำระ</th>
                  <th>จำนวนเงิน</th>
						      <th>รายการ</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
                          @foreach($post as $item)
						    <tr class="alert" role="alert">         
						      <td class="d-flex align-items-center">
                        <div class="img" style="background-image: url(/assets/uploadfile/Borrower/profile/{{$item->imageProfile}});"></div>
						      	<div class="pl-3 email">
						      		<span>{{$item->firstname}} {{$item->lastname}}</span>
						      		<span>วันที่เริ่ม: {{$item->date_start}} </span>
						      	</div>
						      </td>
						      
                              <td  style="color: green; ">
                              <div class="pl-3 email">
						      		<span>จำนวนเงินที่กู้: ฿{{$item->Principle}}</span>
						      		<span>จำนวนงวด: {{$item->instullment_total}} </span>
						      	</div>  
                            </td>
						      <td>
                      <div class="pl-3 email">
						      		  <span>ยอดที่ต้องชำระต่องวด: ฿{{$item->perints}}</span>
						      		  <span>กำหนดชำระ: {{$item->settlement_date}} </span>
						      	  </div>  
                   </td>
                              <td style="color: green;">รอชำระ</td>
						      <td>
                     <a href="{{ route('loaner.Manu3detail',['BorrowDetailID' =>$item->BorrowDetailID]) }}" button class="btn btn-info" type="button">ตรวจสอบ</a>          
				        	</td>
						    </tr>
                            @endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	

@endsection