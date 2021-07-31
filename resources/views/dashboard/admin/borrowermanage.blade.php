
@extends('dashboard.admin.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Borrower</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Borrower</li>
                </ol>
              </nav>
            </div>
          </div>
      </div>
    </div>
</div>
</div>
<script >
  //ajax
function doalert(checkboxElem) {
  if (checkboxElem.checked) {
    const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    $("body").html(this.response);
    document.getElementById("checkbox").checked = true;
  }
 
  xhttp.open("GET", "admin/borrowermanage?status=2");
  xhttp.send();

  } else {
    const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    $("body").html(this.response);
  }
  xhttp.open("GET", "admin/borrowermanage?status=1");
  xhttp.send();
  }
}




</script>

<!-- Page content -->
<div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card">
          <div style=" position: absolute;right: 0px;padding: 20px;">   
          <form id="myform">
            All <input type="checkbox" name="checkfield" id="checkbox"  onchange="doalert(this)"/>
          </form>
                </div>
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Borrower table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" >Email</th>
                    <th scope="col" class="sort" >Firstname</th>
                    <th scope="col" class="sort" >Lastname</th>
                    <th scope="col" class="sort" >Status</th>
                    <th scope="col">Users</th>
                  </tr>
                </thead>
                <tbody class="list">

                  @foreach($post as $item)
                  <tr>
                    <th scope="row">
                  
                    {{ $item->email }}
                  
                    </th>
                    <td class="budget">
                    
                     {{$item->firstname }}
                     
                    </td>
                    <td>
                    {{ $item->lastname }}
                    </td>
                    <td>
                    @if ($item->verify === 1)
                    <span class="viewpass" style>Pass</span>
                    @elseif ($item->verify === 0)
                    <span class="viewwait">Waiting Verify</span>
                    @else ($item->verify === 2)
                    <span class="viewreject">Reject</span>
                    @endif
                    </td>
                    <td>
                     <a href="admin/borrowerview/view/{{$item->BorrowerID}}" button class="btn btn-info" type="button"> view </a>
                    </td>
                 
                  </tr>
                  @endforeach
                  </tbody>
              </table>
            </div>
              <!-- Card footer -->
               <div class="card-footer py-4">
              
            </div> 
          </div>
        </div>
      </div>
</div>
@endsection
