@extends('dashboard.borrower.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
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
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0 text-center">Dashboard</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
             
              <?php   $sql="SELECT *  FROM borrowlist 
             INNER JOIN loaners ON loaners.LoanerID  = borrowlist.LoanerID
             WHERE  borrowlist.status= '1' ";
                $dataloaner=DB::select($sql);       
              ?>

              @foreach($dataloaner as $show)


              <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="../../assets/img/theme/img-1-1000x600.jpg" alt="Card image cap">
              <div class="card-body">
              <h5 class="card-title">{{ $show->email }}</h5>{{ $show->money_max }}
              <p class="card-text">{{ $show->bank }}</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
              </div>





          
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>


































































          @endsection