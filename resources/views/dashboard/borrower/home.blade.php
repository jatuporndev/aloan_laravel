@extends('dashboard.borrower.dashboardlayout')

@section('content')
<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);"> 
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <div class="navbar-search navbar-search-light form-inline mr-sm-3" >
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" id="Search" onkeyup="myFunction()" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <!-- Search form -->
           <div class="navbar-search navbar-search-light form-inline mr-sm-3" >
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
               
                </div>
                <select class="form-control" id="mymoney" onchange="doalert(this.value,myints.value)">
                    <option value="0">วงเงินสูงสุดทั้งหมด</option>
                    <option value="5000">มากกว่า 5,000 บาท</option>
                    <option value="10000">มากกว่า 10,000 บาท</option>
                    <option value="50000">มากกว่า 50,000 บาท</option>
                    <option value="100000">มากกว่า 100,000 บาท</option>
                    <option value="1000000">มากกว่า 1,000,000 บาท</option>
                  </select>
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="navbar-search navbar-search-light form-inline mr-sm-3" >
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
               
                </div>
                <select class="form-control" id="myints" onchange="doalert(mymoney.value,this.value)">
                    <option value="10000">ดอกเบี้ยสูงสุดทั้งหมด</option>
                    <option value="5">ไม่เกิน 5%</option>
                    <option value="8">ไม่เกิน 8%</option>
                    <option value="13">ไม่เกิน 13%</option>
                  </select>
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
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
                    <img alt="ImageProfile" src="{{ url('/') }}/assets/uploadfile/Borrower/profile/{{ Auth::guard('borrower')->user()->imageProfile }}" class="borrower_picture">
                  </span> 
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold" style="color:white">{{ Auth::guard('borrower')->user()->firstname }}</span>
                  </div>
                </div>
        </div>
      </div>
    </nav>
    <!-- Header -->
 
    <!-- Header -->
<div class="header pb-4" style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);"> 
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


           
<script>
function myFunction() {
  var input = document.getElementById("Search");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('col-xl-4 col-md-6');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}


function doalert(moneyMax,interest) {
  
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
  $("body").html(this.response);
  document.getElementById("mymoney").value = moneyMax
  document.getElementById("myints").value = interest

  } 
  xhttp.open("GET", "borrower/home?money_max="+moneyMax+"&interest="+interest);
  xhttp.send();
 
 
}




</script>

        <!-- Page content -->
    <div class="container-fluid mt--5" id="here">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0 text-center">Dashboard ผู้ให้บริการ</h3>
            </div>
            <div class="card-body">
              <div class="row">
             
              

              @foreach($dataloaner as $show)

              <div class="col-xl-4 col-md-6"  >
              <div class="card">
              <div class="row justify-content-center">
              <a href="borrower/viewborrower/{{$show->LoanerID}}">
              <img class="rounded-circle" src="{{ url('/') }}/assets/uploadfile/Loaner/profile/{{ $show->imageProfile }}" alt="image profile" width='100px' height='100px'>
              </a>  
              </div>
              <div class="card-body" >
              <h3 class="card-title">คุณ {{ $show->firstname }} {{ $show->lastname }}</h3>
              <p class="card-text">วงเงิน : 0 ~ {{ $show->money_max }} บาท</p>
              <p class="card-text">ดอกเบี้ยรายปี : {{ $show->interest }}%</p>
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