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
    $BorrowerID = Auth::guard('borrower')->user()->BorrowerID;

    $sql="SELECT borrowdetail.*,loaners.*,ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as perints,
    (SELECT settlement_date FROM history  WHERE BorrowDetailID = borrowdetail.BorrowDetailID AND status =0 LIMIT 1) as settlement_date FROM borrowdetail 
          INNER JOIN borrowlist ON borrowdetail.borrowlistID = borrowlist.borrowlistID
          INNER JOIN loaners ON borrowlist.LoanerID = loaners.LoanerID
          WHERE 1 AND  BorrowerID = $BorrowerID  AND borrowdetail.status = 0";

    $data = DB::select($sql);
?>

   <div class="container-fluid mt--4">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-xl">
						  <thead>
						    <tr>
						    	<th>ผู้ให้กู้</th>
                  <th>&emsp;คำขอ</th>
						      <th>&emsp;รายละเอียด</th>
						      <th>&emsp;สถานะ</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>

                          @foreach($data as $item)
						    <tr class="alert" role="alert">          
						      <td class="d-flex align-items-center">
                      <div class="img" style="background-image: url(/assets/uploadfile/Loaner/profile/{{$item->imageProfile}});">
                      </div>
						      	<div class="pl-3 email">
                                  <span>รหัส : {{$item->BorrowDetailID}} </span>
						      		<span>{{$item->firstname}} {{$item->lastname}}</span>
						      		<span>วันที่ส่งคำขอกู้ : {{$item->date_start}} </span>
                                      
						      	</div>
						      </td>
						      
                            
                        <td>
                        <div class="pl-3 email">
						      		<span>จำนวนเงินที่กู้ : ฿{{$item->Principle}}</span>
						      		<span>จำนวนงวด :  ฿{{$item->instullment_total}} </span>
                                      <span> </span>
						      	</div>  
                      </td>

                      <td>
                        <div class="pl-3 email">
						      		<span>ยอดที่ต้องชำระต่องวด :<h3 style="color:orange;"> ฿{{$item->perints}}</h3></span>
                                      <span> </span>
						      	</div>  
                      </td>
                      <td>

                        <div class="pl-3 email">

						      		<span>กำหนดชำระ : ฿{{$item->settlement_date}}</span>
                                      <span> </span>
						      	</div>  
                      </td>
                         


						      <td>
                          
                              <a href="{{ route('borrower.menu3Detail',['BorrowDetailID' =>$item->BorrowDetailID]) }}" button class="btn btn-info" type="button">ตรวจสอบ</a>
                          
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