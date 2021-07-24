@extends('dashboard.borrower.dashboardlayout')

@section('content')
<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark border-bottom" style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);"> 
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                </div>              
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
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
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
            </li>
          </ul>
         
                <div class="media align-items-center">
                   <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ url('/') }}/assets/uploadfile/Borrower/profile/{{ Auth::guard('borrower')->user()->imageProfile }}" class="borrower_picture">
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
<div class="header pb-4" style="background: linear-gradient(90deg, rgba(252,176,69,1) 0%, rgba(253,29,29,1) 71%, rgba(131,58,180,1) 100%);">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">ตรวจสอบ</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="{{ route('borrower.home') }}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="{{ route('borrower.menu3') }}">ที่ต้องชำระ</a></li>
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
<link rel="stylesheet" href="assets/css/menu3Detail.css" type="text/css">
<!-- Page content -->
<div class="container-fluid mt--1">
  <form action="{{ route('borrower.payment',['BorrowDetailID' =>$view->BorrowDetailID]) }}" method="POST" enctype="multipart/form-data" id="request">
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
                <p class="font-weight-bold money_minn text-center" >{{ $view->firstname}} {{ $view->lastname}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-4">
                <h3 class="card-title">อีเมล</h3>
              </div>
              <div class="col-6 col-md-7">
                <p class="font-weight-bold money_minn text-center">{{ $view->email}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-4">
                <h3 class="card-title">เบอร์โทรศัพท์</h3>
              </div>
              <div class="col-6 col-md-7">
                <p class="font-weight-bold money_minn text-center" >{{ $view->phone}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-4">
                <h3 class="card-title">LineID</h3>
              </div>
              <div class="col-6 col-md-7">
                <p class="font-weight-bold money_minn text-center" >{{ $view->LineID}}</p>
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
            <div class="col-6 col-md-5">
              <h3 class="card-title">ยอดที่ต้องชำระทั้งหมด</h3>
            </div>
            <div class="col-6 col-md-3">
              <p class="font-weight-bold text-center"></p>
            </div>
            <div class="col-6 col-md-4 ">
              <h3 class="card-title text-center">{{ $view->total}} บาท</h3>
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
            <a class="font-weight-bold  text-center" style="text-decoration: underline; color:blue" data-toggle="modal" data-target="#his" type="button">ประวัติการชำระเงิน</a>

            </div>
          </div>

  <style>


</style>

<?php
         date_default_timezone_set('Asia/Bangkok');
         $datenow = date('Y-m-d');
         $Date = date('Y-m-d');
         $Date = strtotime("+1 months", strtotime($Date));
         $Date = date('Y-m-d',$Date); 
        $sql="SELECT history.*, IF(settlement_date < '$datenow', '1', '0') as dateset_status,
        ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as moneySet,
        ROUND(( ((borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total*(borrowdetail.Interest_penalty/100)) ),2) as interest_penalty_money
        FROM history 
        INNER JOIN borrowdetail ON borrowdetail.BorrowDetailID = history.BorrowDetailID 
        WHERE history.BorrowDetailID = $view->BorrowDetailID ";
        $sql.=" AND  settlement_date <= '$Date' AND history.status = 0 ";
        $data1 = DB::select($sql);
?>

   <table>


     <script>
    var perfEntries = performance.getEntriesByType("navigation");
    if (perfEntries[0].type === "back_forward") {
    location.reload(true);
    }     

    let money=0;
    let moneyBase=0;
    let arrayHistoryID =[];
    function doFire(moneyset,moneybase,hisID) {
    money+=parseFloat(moneyset);
    moneyBase+=parseFloat(moneybase);
    arrayHistoryID.push(hisID);
}


    </script>

  @foreach($data1 as $bill)
  
  <tr>
     @if($bill->dateset_status ==0)
    <td><input type="checkbox" id="myCheck" name="vehicle1" onclick="doAlert(this,{{$bill -> moneySet}},{{$bill -> HistoryID}})" ></td>
    @elseif($bill->dateset_status ==1)
    <td><input type="checkbox" id="myCheck" name="vehicle1" value="{{$bill -> moneySet+ $bill -> interest_penalty_money }}"  checked disabled></td>
    @php
    $moneysum =$bill -> moneySet + $bill -> interest_penalty_money;
    @endphp
    
    <script type='text/javascript'> doFire(<?php echo $moneysum ?>,<?php echo $bill -> moneySet ?>,<?php echo $bill -> HistoryID ?>); </script>
    @endif
    <td>
    <span class="name">รหัส {{$bill -> HistoryID}}</span>  <br/>
    <span class="name">กำหนดชำระ </span>  <br/>
    <span class="subtext">{{$bill -> settlement_date}}&emsp;&emsp;&emsp;&emsp;</span>
  </td>
    @if($bill->dateset_status ==0)
    <td><h3 class="mb-1 text-center">{{$bill -> moneySet}} บาท </h3></td>
    @elseif($bill->dateset_status ==1)
    <td>
    <span class="name">เลยวันกำหนด </span>  <br/>
    <span class="name"><h3>รหัส {{$bill -> moneySet}} บาท</span><br/></h3>
    <span class="name" style="color:red;">ค่าปรับ {{$bill -> interest_penalty_money}}</span>  <br/>
    </td>
    @endif
  </tr>

  @endforeach
</table>
  <p>&emsp;</p>
  <div style="text-align: center;">
  <div class="form-group"  >
 
    <fieldset>
  
    
        <span type="text" class="money" name="something" id="totalMoney">  ss</span>
        <input type='hidden' id="total_Money" name='totalMoney' value='test' />
        <input type='hidden' id="Moneybase" name='Moneybase' value='test' />
        <input type='hidden' id="aryhistoryID" name='aryhistoryID' value='test' />
        <input type='hidden'  name='loanerID' value='{{$view->LoanerID}}' />
        
        <span class="bath">บาท</span>
    </fieldset>
  
             
  </div>
  <p>&emsp;</p>
              <button type="submit" class="btn btn-warning" name="Accept" style="background-color:#33BC40">
                            ชำระเงิน
                      </button>

          
                      
                      </div>
        </div>
      </div>
    </div>
  </div>
  </from>
</div>
<script>

function doAlert(checkboxElem,moneyset,hisID) {
  
    if (checkboxElem.checked) {
        money += moneyset;
        moneyBase+=moneyset;
        arrayHistoryID.push(hisID);
    } else {
      money -= moneyset;
      moneyBase-=moneyset;
      const index = arrayHistoryID.indexOf(hisID);
      if (index > -1) {
        arrayHistoryID.splice(index, 1);
}
    }
    document.getElementById("totalMoney").innerHTML ="ยอดที่ต้องชำระ : "+ money;
    document.getElementById("total_Money").value = money;
    document.getElementById("Moneybase").value = moneyBase;
    document.getElementById("aryhistoryID").value = arrayHistoryID;
    console.log(arrayHistoryID);
}
    
    document.getElementById("totalMoney").innerHTML ="ยอดที่ต้องชำระ : "+ money ;
    document.getElementById("total_Money").value = money;
    document.getElementById("Moneybase").value = moneyBase;
    document.getElementById("aryhistoryID").value = arrayHistoryID;

</script>

<?php 
$sql="SELECT * FROM historydetailbill WHERE BorrowDetailID = $view->BorrowDetailID";
$datahis = DB::select($sql);
?>



<div class="modal fade" id="his" tabindex="-1" role="dialog" aria-labelledby="criModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title " id="criModalLabel">สาเหตุ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="w3-container">
                                                      <h2>&emsp; ประวัติการกู้</h2>
                                                      <table class="w3-table w3-striped">
                                                @foreach($datahis as $item)
                                              
                                                      
                                                        <tr>
                                                          <td style="padding: 5px 5px;" >
                                                          <div class="pl-3 email">
                                                           
                                                          <div>รหัส{{$item->historyDetailID}}</div>
                                                      
                                                            <div>วันที่: {{$item->datepaying}}</div>
                                                            <div>ยอดชำระ: ฿{{$item->money_total}} </div>
                                   
                                                      
                                                          
                                                          </div>
                                                          </td>
                                                       
                                                          <td>
                                                            @if($item->status==0)
                                                            <div style="color : orange;"> รอยืนยัน</div>
                                                            @elseif($item->status==1)
                                                            <div style="color : green;"> ยืนยันแล้ว</div>
                                                            @elseif($item->status==2)
                                                            <div style="color : red;"> ยกเลิกแล้ว</div>
                                                            @endif
                                                            
                                                        </td>
                                                        <td> 
                                                        @if($item->status==0)
                                                        
                                                            <div><button  style="background-color: #008CBA;color:#FFFFFF;" data-toggle="modal" data-target="#hisDetailna{{$item->historyDetailID}}" type="button" >ตรวจสอบ</button></div>
                                                            @elseif($item->status==1)
                                                          
                                                            <div><button  style="background-color: #008CBA;color:#FFFFFF;" data-toggle="modal" data-target="#hisDetailna{{$item->historyDetailID}}" type="button" >ตรวจสอบ</button></div>
                                                            @elseif($item->status==2)
                                                  
                                                            @endif
                                                        </td>
                                                        </tr>
  
<!-- model -->
<div class="modal fade" id="hisDetailna{{$item->historyDetailID}}" tabindex="-1" role="dialog" aria-labelledby="criModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title " id="criModalLabel">ใบเสร็จยืนยัน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                
                                <!-- Code PHP-->
                                <?php
                                 $sql="SELECT * FROM historydetailbill WHERE historyDetailID = $item->historyDetailID";
                                 $data1 = DB::Select($sql)[0];
                         
                                 date_default_timezone_set('Asia/Bangkok');
                                 $datenow = date($data1->datepaying);
                                 $sql="SELECT history.*, IF(settlement_date < '$datenow', '1', '0') as dateset_status,
                                 ROUND(( (borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total ),2) as moneySet,
                                 ROUND(( ((borrowdetail.Principle+(borrowdetail.Principle*(borrowdetail.Interest/100)))/borrowdetail.instullment_total*(borrowdetail.Interest_penalty/100)) ),2) as interest_penalty_money
                                 FROM history 
                                 INNER JOIN borrowdetail ON borrowdetail.BorrowDetailID = history.BorrowDetailID 
                                 WHERE  history.historyDetailID = $item->historyDetailID ";
                                 $datahistory = DB::select($sql);
                                 $i =1;
                                ?>
                                <!-- End Code PHP-->

                                              <div class="modal-body">
                                            
                                                
                                                @foreach($datahistory as $itembill)
                                                
                                                <div class="row">
                                                          <div class="col-lg-5">
                                                              <h3><label class="card-title col-md-11 col-form-label text-md-center">งวดชำระที่ {{$i}}</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group"> 
                                                              <div class="form-control text-center">
                                                                <span>รหัส {{$itembill-> HistoryID}}</span>
                                                                <span>งวดที่ {{$itembill-> settlement_date}}</span> 
                                                              </div>
                                                            </div>     
                                                          </div>   
                                                  </div>
                                                          <?php $i=$i+1; ?>
                                                @endforeach
                        
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                             <h3><label class="card-title col-md-11 col-form-label text-md-center">วันที่ชำระ</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                              <span class="form-control text-center" type="text" >{{$item-> datepaying}}</span>
                                                               </div>     
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                             <h3><label class="card-title col-md-11 col-form-label text-md-center">ยอดชำระ</label></h3> 
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <span class="form-control text-center" type="text" >฿ {{$item-> money}}</span>
                                                               </div>     
                                                            </div>   
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-11 col-form-label text-md-center">ค่าปรับ</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <span class="form-control text-center" type="text" >฿ {{($item-> money_total) - ($item-> money)}}</span>
                                
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-12 col-form-label text-md-center">ยอดชำระรวม</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <span class="form-control text-center" type="text" >฿ {{$item-> money_total}}</span>
                                                              </div>   
                                                            </div>     
                                                      </div>
                                                      <div class="row">
                                                          <div class="col-lg-5">
                                                          <h3><label class="card-title col-md-11 col-form-label text-md-center">ใบเสร็จยืนยัน</label></h3>   
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="input-group">
                                                            <img src="{{ url('/') }}/assets/uploadfile/Borrower/payment/{{$item-> imageBill}}" width='250px' height='400px'>
                                                              </div>   
                                                            </div>    
                                                      </div>
                                                  
                                               
                                                
                                            </div>
                                </div>
                          </div>
                    </div>
<!-- model -->
                                                        @endforeach
                                                      </table>
                                                    </div>
                                                    </form>
                                </div>
                          </div>
                    </div>











@endsection