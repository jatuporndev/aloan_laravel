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
<link rel="stylesheet" href="assets/css/menu3Detail.css" type="text/css">

<?php

$sql="SELECT * FROM loaner_bank 
INNER JOIN banklist ON loaner_bank.banklistID = banklist.banklistID
WHERE LoanerID =$loanerID";
 $bank=DB::select($sql);     
?>

 <!-- Page content -->
 <div class="container-fluid mt--6" style="padding-top:40px;  text-align: center;">
      <div class="row justify-content-center">
       
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 style="text-align: left;"> ชำระเงิน </h3>
                </div>
               
              </div>
            </div>
            <div class="card-body">
            <form  action="{{ route('borrower.crateHistoryBill',['BorrowDetailID' =>$BorrowDetailID]) }}" method="POST" enctype="multipart/form-data" >
                     @csrf
               
                
              
                <!-- Description -->
                <div class="form-group"  >
 
    <fieldset>
  
      <div >  จำนวนเงินที่ต้องโอน : </div></br>
        <span type="text" class="money" name="something" id="totalMoney">ยอดที่ต้องชำระ : {{$totalMoney}}</span>
        <input type="hidden" name="moneyTotal" value="{{$totalMoney}}" >  
        <input type="hidden" name="Moneybase" value="{{$Moneybase}}" > 
        
        
        <span class="bath">บาท</span>
    </fieldset>
  
             
  </div>
                
                
  <input  type="hidden" name="arrayHistoryID" value='{{$arrayHistorID}}' >  
                  
                <div style="margin: auto; width: 70%;">
                <label class="form-control-label" >โอนไปที่</label>
                <table class="w3-table w3-striped">
                        @foreach($bank as $bank)
                   
                       </p>
                       
                      </div>
                    </div>
                  </div>
                  <tr>                                      
                      <td><H1> <img src="/assets/uploadfile/bank/{{$bank ->imagebank}}" width='80px' height='80px'>  </H1> </td>
                                                          <td style="padding: 5px 5px;" >
                                                          <div class="pl-3 email">
                                                           
                                                          <div>ชื่อผู้ถือบัญชี : {{$bank ->holderName}} </div>
                                                          <div>ธนาคาร : {{$bank ->bank}} </div>     
                                                          <h2> เลขที่บัญชี : {{$bank ->bankNumber}} </h2>  
                                                                                                     
                                            
                                                          </div>
                                                          </td>
                                                       
                                                          <td>
                                               
                                                        </td>
                                                        <td> 
                                                        
                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                      </table>
            
</div>


                  
                     
                      
                  <div style="margin: auto; width: 70%;">
                  <p>&nbsp;</p>
                        <label for="image">หลักฐานการโอน</label>
                        <input style="	cursor:pointer;" type="file" name="imageBill" class="form-control">  </br>
                        <button style="background-color:#44c767;
	border-radius:28px;
	border:1px solid #18ab29;
	cursor:pointer;
	color:#ffffff;
	font-size:17px;
	padding:16px 31px;"
    
    type="submit">ยืนยัน</button>
    <p>
                    </div>
     
               
                  </div>
                </div>
            
              </form>
            </div>
          </div>
        </div>
      </div>


      










































@endsection