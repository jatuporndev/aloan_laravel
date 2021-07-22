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
    (SELECT settlement_date FROM history  WHERE BorrowDetailID = borrowdetail.BorrowDetailID AND status =0 LIMIT 1) as settlement_date,
    (SELECT 'True' FROM history WHERE BorrowDetailID = borrowdetail.BorrowDetailID  AND status = 1 LIMIT 1) as checkpay
    
  
     FROM borrowdetail 
    INNER JOIN Borrowers ON borrowdetail.BorrowerID = Borrowers.BorrowerID
    INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
    WHERE 1 AND borrowlist.LoanerID = $loanerID AND borrowdetail.status =0";
        $post = DB::select($sql); 
    ?>

		<div class="container-fluid mt--7">
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