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

    $borrowlistID  = "";
        $sql="SELECT request.*,loaners.*  FROM request
        INNER JOIN borrowlist ON borrowlist.borrowlistID =request.borrowlistID
        INNER JOIN loaners ON loaners.LoanerID  = borrowlist.LoanerID 
        WHERE 1 ";
        if($borrowlistID!=""){
            $sql.=" AND (request.status = 0 OR request.status = 1 OR request.status = 2 OR request.status = 3 )"; 
            $sql.=" AND borrowlist.borrowlistID =$borrowlistID AND request.BorrowerID =$BorrowerID";   
        }if($BorrowerID!="" && $borrowlistID==""){
            $sql.=" AND (request.status = 0 OR request.status = 2) "; 
            $sql.=" AND request.BorrowerID =$BorrowerID ";      
        }
        $data=DB::select($sql);  
?>


	<p style="padding-top: 100px;"></p>

    <div class="container-fluid mt--7">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-responsive-xl">
						  <thead>
						    <tr>
						    	<th>ผู้ให้กู้</th>
                  <th>จำนวนเงิน</th>
						      <th>จำนวนงวด</th>
						      <th>Status</th>
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
						      		<span>{{$item->firstname}} {{$item->lastname}}</span>
						      		<span>วันที่ส่งคำขอกู้ : {{$item->dateRe}} </span>
						      	</div>
						      </td>
						      
                              @if($item->status ==0)
                              <td>฿{{$item->Money}}</td>
						      <td>{{$item->instullment_request}}</td>
                              <td style=" color: orange;" >รอตรวจสอบ</td>
                              @elseif($item->status  ==2)
                              <td>฿{{$item->money_confirm}}</td>
						      <td>{{$item->instullment_confirm}}</td>
                              <td style=" color: green;">รอผู้ให้กู้โอนเงิน</td>
                              @endif


						      <td>
                              @if($item->status ==0)
                              <a href="{{ route('borrower.updateUnpass',['id' =>$item->RequestID]) }}" button class="btn btn-danger" type="button">ยกเลิก</a>
                              @endif
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