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
<link rel="stylesheet" href="assets/css/style.css" type="text/css">


    <?php
    $loanerID = Auth::guard('loaner')->user()->LoanerID;
    $sql="SELECT borrowers.*,borrowdetail.* FROM borrowdetail 
        INNER JOIN borrowlist ON borrowlist.borrowlistID = borrowdetail.borrowlistID
        INNER JOIN borrowers ON borrowers.BorrowerID =borrowdetail.BorrowerID
        WHERE borrowlist.loanerID = $loanerID AND borrowdetail.status = 1";
        $post = DB::select($sql); 
    ?>


	<body>

		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-xl">
						  <thead>
						    <tr>
						
						    	<th>ผู้ให้กู้</th>
                                <th>จำนวนเงิน</th>
						      <th>รายการ</th>
                              <th>&nbsp;</th>
						      <th>สถานะ</th>
						
						    </tr>
						  </thead>
						  <tbody>
                          @foreach($post as $item)
						    <tr class="alert" role="alert">
                           
						      <td class="d-flex align-items-center">
                              <div class="img" style="background-image: url(/assets/uploadfile/Borrower/profile/{{$item->imageProfile}});">
                            </div>
						      	<div class="pl-3 email">
                                  <span>{{$item->firstname}} {{$item->lastname}}</span>
						      		<span></span>
						      		
						      	</div>
						      </td>
						      
                              <td  style="color: green;">
                              <div class="pl-3 email">
						      		<span>จำนวนเงินที่กู้: ฿{{$item->Principle}}</span>
						      		<span>จำนวนงวด: {{$item->instullment_total}} </span>
                                    <span>ดอกเบี้ย: {{$item->Interest}}% </span>
                                    <span> </span>
						      	</div>  
                            </td>
						      <td>
                              <div class="pl-3 email">
                              <span>วันที่เริ่ม: {{$item->date_start}} </span>
                              <span>วันที่ปิดชำระ: {{$item->Update_date}} </span>
						      	</div>  
                              </td>
                              <td>
                           
                              
    
				        	</td>
                              <td style="color: green;">สำเร็จแล้ว</td>


						      
						    </tr>
                            @endforeach
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	


	</body>



@endsection