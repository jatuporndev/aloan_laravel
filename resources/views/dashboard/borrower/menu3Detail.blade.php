@extends('dashboard.borrower.dashboardlayout')

@section('content')
<div class="header pb-4" style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="{{ route('borrower.home') }}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('borrower.home') }}">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">ผู้ให้กู้</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!-- Page content -->
<div class="container-fluid mt--1">
  <form action="{{ route('borrower.updateAccept',['id' =>$view->RequestID]) }}" method="POST" enctype="multipart/form-data" id="request">
    @csrf
    <div class="row justify-content-center">
      <div class="col-xl-7 order-xl-6">
        <div class="card card-profile">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <img src="{{ url('/') }}/assets/uploadfile/Loaner/profile/{{ $view->imageProfile }}" class="rounded-circle">
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-4">
                <h3 class="card-title">ชื่อ-นามสกุล</h3>
              </div>
              <div class="col-6 col-md-7">
                <p class="font-weight-bold money_minn text-center" style="margin-left: 20em;">{{ $view->firstname}} {{ $view->lastname}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-4">
                <h3 class="card-title">อีเมล</h3>
              </div>
              <div class="col-6 col-md-7">
                <p class="font-weight-bold money_minn text-center" style="margin-left: 20em;">{{ $view->email}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-4">
                <h3 class="card-title">เบอร์โทรศัพท์</h3>
              </div>
              <div class="col-6 col-md-7">
                <p class="font-weight-bold money_minn text-center" style="margin-left: 20em;">{{ $view->phone}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-4">
                <h3 class="card-title">LineID</h3>
              </div>
              <div class="col-6 col-md-7">
                <p class="font-weight-bold money_minn text-center" style="margin-left: 20em;">{{ $view->LineID}}</p>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
</div>

<!-- Borrowlist -->
<div class="container-fluid mt--0">
  <div class="row justify-content-center">
    <div class="col-xl-7 order-xl-2">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-9 col-md-11 text-center">
              <h2 class="mb-1 text-center">คำขอกู้ </h2>
              <h2 class="mb-0 text-center"> </h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">เงินต้น</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->Principle}} บาท</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">จำนวนงวด</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->instullment_total}} </h3>

            </div>
          </div>
          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">ดอกเบี้ย</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold  text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->Interest}}%</h3>

            </div>
          </div>

          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">ดอกเบี้ยค่าปรับ</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold  text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->Interest_penalty}}%</h3>
            </div>
          </div>
          <p>&emsp;</p>






        </div>
      </div>
    </div>
  </div>
  </from>
</div>

<div class="container-fluid mt--0">
  <div class="row justify-content-center">
    <div class="col-xl-7 order-xl-2">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-9 col-md-11 text-center">
              <h2 class="mb-1 text-center">รายละเอียดการกู้ </h2>
              <h2 class="mb-0 text-center"> </h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">ยอดที่ต้องชำระทั้งหมด</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->remain}} บาท</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">เงินคงเหลือ</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->remain}} บาท</h3>

            </div>
          </div>
          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">งวดคงเหลือ</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold  text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->instullment_Amount}}</h3>

            </div>
          </div>
          <div class="row">
            <div class="col-6 col-md-4">
              <h3 class="card-title">รายการ :</h3>
            </div>
            <div class="col-6 col-md-4">
              <p class="font-weight-bold  text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
           

            </div>
          </div>

          <style>
table {
  width: 100%;
  border-collapse: collapse;
  border: 3px solid orange ;
}
td{
  padding: 20px 30px;
}
</style>

   <table>
  
  <tr>
    <td><input type="checkbox" name="vehicle1" style="width: 30px; height: 30px;"></td>
    <td>
    <span class="name">รหัส</span>  <br/>
    <span class="name">กำหนดชำระ</span>  <br/>
    <span class="subtext">2562-5-60&emsp;&emsp;&emsp;&emsp;</span>
  </td>
    <td><h3 class="mb-1 text-center">จำนวนที่ตองชำระ 50000 </h3></td>
  </tr>
  
</table>



          <p>&emsp;</p>
          <div class="text-center">
          <div class="row align-items-center">
            <div class="col-9 col-md-11 text-center">
              <h2 class="mb-1 text-center">จำนวนที่ต้องชำระ 50000 </h2>
              <h2 class="mb-0 text-center"> </h2>
              <p>&emsp;</p>
              <button type="submit" class="btn btn-warning" name="Accept" style="background-color:#33BC40">
                            ยอมรับ
                      </button>
            </div>
          </div>
                      
                      </div>


             


        </div>
      </div>
    </div>
  </div>
  </from>
</div>


<!-- EndBorrowlist -->

<!-- EndCriterion -->


<!-- Request -->

<!-- EndCriterion -->
@endsection