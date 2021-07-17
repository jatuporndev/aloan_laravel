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

        <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0 text-center">Dashboard ผู้ให้บริการ</h3>
            </div>
            <div class="card-body">
              <div class="row">
             
              <?php   
              $sql="SELECT *  FROM borrowlist 
              INNER JOIN loaners ON loaners.LoanerID  = borrowlist.LoanerID
              WHERE  borrowlist.status= '0' OR '1' ";
              $dataloaner=DB::select($sql);       
              ?>

              @foreach($dataloaner as $show)

              <div class="col-xl-4 col-md-6">
              <div class="card" style="width: 18rem;">
              <div class="row justify-content-center">
              <a href="#">
              <img class="rounded-circle" src="{{ url('/') }}/assets/uploadfile/Loaner/profile/{{ $show->imageProfile }}" alt="image profile" width='100px' height='100px'>
              </a>  
              </div>
              <div class="card-body">
              <h3 class="card-title">คุณ {{ $show->firstname }} {{ $show->lastname }}</h3>
              <p class="card-text">วงเงิน : 0 ~ {{ $show->money_max }} บาท</p>
              <p class="card-text">ดอกเบี้ยรายปี : {{ $show->interest }} %</p>
              <a href="borrower/viewborrower/{{$show->LoanerID}}" class="btn btn-primary">View</a>
              </div>
              </div>
              </div>




          
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>

































































          @endsection