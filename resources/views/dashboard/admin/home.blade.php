
@extends('dashboard.admin.dashboardlayout')

@section('content')
<div class="header bg-primary pb-4">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-5 col-5 text-center">
            <div class="card card-stats"> 
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="h2 font-weight-bold mb-0">ยอดสรุปเดือนนี้   (<?php echo "เดือน ". date("m"); ?>)</span>
                    </div>
                    
                  </div>
                  
                </div> 
              </div>
            </div>
          </div>
         <!-- Card stats -->
         <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats"> 
                
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total User</h5>

                      <?php 
                      
                      $sql="SELECT COUNT(BorrowerID)+(SELECT COUNT(LoanerID) FROM loaners WHERE MONTH(created_at) = MONTH(NOW())) as total,
                      COUNT(BorrowerID) as borrowertotal,
                      (SELECT COUNT(LoanerID) FROM loaners WHERE MONTH(created_at) = MONTH(NOW())) as loanertotal
                       FROM borrowers WHERE MONTH(created_at) = MONTH(NOW())"; 
                      $data = DB::select($sql)[0];


                      $sql2="SELECT COUNT(borrowDetailID) as total FROM borrowdetail WHERE MONTH(date_start) = MONTH(NOW())";
                      $detail = DB::select($sql2)[0];

                      //%borrower
                      $sql3="SELECT COUNT(BorrowerID) as a FROM borrowers WHERE MONTH(created_at) = MONTH(NOW() - interval 1 MONTH)";
                      $perl= DB::select($sql3)[0];
                      if($perl->a >0 ){
                      $per= (($data->borrowertotal / $perl->a)-1)*100 .'%';
                      }else{
                        $per="ไม่มีข้อมูลเดือนก่อน";
                      }

                      //%loaner
                      $sql4="SELECT COUNT(LoanerID) as a FROM loaners WHERE MONTH(created_at) = MONTH(NOW() - interval 1 MONTH)";
                      $perloanerl= DB::select($sql4)[0];
                      if($perloanerl->a >0 ){
                      $perloaner= (($data->loanertotal / $perloanerl->a)-1)*100 .'%';
                      }else{
                        $perloaner="ไม่มีข้อมูลเดือนก่อน";
                      }

                       //%borrowdetail
                       $sql5="SELECT COUNT(borrowDetailID) as a FROM borrowdetail WHERE MONTH(date_start) = MONTH(NOW() - interval 1 MONTH)";
                       $perdetaill= DB::select($sql5)[0];
                       if($perdetaill->a >0 ){
                       $perdetail= (($detail->total / $perdetaill->a)-1)*100 .'%';
                       }else{
                         $perdetail="ไม่มีข้อมูลเดือนก่อน";
                       }

                       //total
                        $sql6="SELECT COUNT(BorrowerID)+(SELECT COUNT(LoanerID) FROM loaners WHERE MONTH(created_at) = MONTH(NOW() - interval 1 MONTH)) as a 
                         FROM borrowers WHERE MONTH(created_at) =  MONTH(NOW() - interval 1 MONTH)";
                         $pertotall= DB::select($sql6)[0];
                         if($pertotall->a >0 ){
                         $pertotal= (($data->total / $pertotall->a)-1)*100 .'%';
                         }else{
                           $pertotal="ไม่มีข้อมูลเดือนก่อน";
                         }


                   

                        $mount=["","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];

                        $sql7 = "SELECT MONTH(date_start) AS label, 
                        COUNT(BorrowDetailID)  AS y 
                        FROM borrowdetail 
                        GROUP BY MONTH(date_start)
                        ORDER BY MONTH(date_start) ASC";      
                        $dataG=DB::select($sql7);
                        $totalborrow=0;
                        $dataPoints =array();
                         foreach($dataG as $item){
                          $totalborrow=$totalborrow+$item->y;
                          array_push($dataPoints,array("label"=> $mount[$item->label], "y"=> $item->y));
                         }

                      ?>
                     
                      <span class="h2 font-weight-bold mb-0">{{$data->total}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    @if($pertotal>=0)
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>  {{$pertotal}}</span></br>
                    @else
                    <span class="text-fali mr-2"><i class="fa fa-arrow-down"></i>  {{$pertotal}}</span></br>
                    @endif
                    <span class="text-nowrap">Since last month ({{$pertotall->a}})</span>
 
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats"> 
                <!-- Card body -->
                 <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New Loaner</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->loanertotal}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                  @if($perloaner>=0)
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>  {{$perloaner}}</span></br>
                    @else
                    <span class="text-fali mr-2"><i class="fa fa-arrow-down"></i>  {{$perloaner}}</span></br>
                    @endif
                    <span class="text-nowrap">Since last month ({{$perloanerl->a}})</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats"> 
                <!-- Card body -->
                 <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New Borrower</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->borrowertotal}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    @if($per>=0)
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>  {{$per}}</span></br>
                    @else
                    <span class="text-fali mr-2"><i class="fa fa-arrow-down"></i>  {{$per}}</span></br>
                    @endif
                    <span class="text-nowrap">Since last month ({{ $perl->a}})</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats"> 
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">จำนวนการกู้</h5>
                      <span class="h2 font-weight-bold mb-0">{{$detail->total}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                  @if($perdetail>=0)
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>  {{$perdetail}}</span></br>
                    @else
                    <span class="text-fali mr-2"><i class="fa fa-arrow-down"></i>  {{$perdetail}}</span></br>
                    @endif
                    <span class="text-nowrap">Since last month ({{ $perdetaill->a}})</span>
                  </p>
                </div> 
              </div>
            </div>
</div>
        </div>
      </div>
    </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl">
          <div class="card bg-Secondary">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  
                </div>
             
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>
        
    </div>
    </div>


    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "ยอดจำนวนการกู้ทั้งหมด ("+ <?php echo $totalborrow ?>+")"
	},
	axisY: {
		suffix: "",
		scaleBreaks: {
		autoCalculate: false
		}
	},
	data: [{
		type: "column",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
  
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
