@extends('dashboard.loaner.dashboardlayout')

@section('content')
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('loaner.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
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
          <?php $sql="SELECT *  FROM borrowlist WHERE LoanerID = $id" ;
                $databorrowlist=DB::select($sql)[0]
              ?>

         วงเงินต่ำสุด = {{$databorrowlist -> money_min}}
        วงเงินสุงสุด = {{$databorrowlist -> money_max}}
         {{$databorrowlist -> interest}}
         {{$databorrowlist -> borrowlistID}}
         {{$databorrowlist -> borrowlistID}}


          @endsection