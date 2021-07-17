<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Borrower Register </title>
  <base href="{{ \URL::to('/')}}">
  <!-- Favicon -->
  <link rel="icon" href="img/alogo.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<body>

<div class="container mt--2 pb-3">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
                <div class="card-body px-lg-7 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h2>Borrower Register</h2><hr>
                  </div>
                  <form action="{{ route('borrower.create') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                          <label for="firstname" class="col-md-4 col-form-label text-md-right">FirstName</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="firstname" placeholder="Enter firstname" value="{{ old('firstname') }}">
                          <span class="text-danger">@error('firstname'){{ $message }} @enderror</span>
                          </div>
                      </div>
					  <div class="form-group row">
                          <label for="lastname"class="col-md-4 col-form-label text-md-right">LastName</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="lastname" placeholder="Enter lastname" value="{{ old('lastname') }}">
                          <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group">
                            <label for="gender">Gender</label>
                            <p></p>
                            <div class="from-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderM" value="0" {{ old('gender') == '0' ? 'checked' : ''}}>
                                <label for="genderM" class="form-check-label">Male</label>
                            </div>
                            <div class="from-check form-check-inline">
                                <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="gender" id="genderF" value="1" {{ old('gender') == '1' ? 'checked' : ''}}>
                                <label for="genderF" class="form-check-label">Female</label>
                                <span class="text-danger">@error('gender'){{ $message }} @enderror</span>
                            </div>
                      </div>

                      <div class="from-group">
                            <label for="birthday">Birthday</label>
                            <p></p>
                            <input class="form-control @error('birthday') is-invalid @enderror" type="date" value="{{ old('birthday') }}" id="birthday" name="birthday">
                            <span class="text-danger">@error('birthday'){{ $message }} @enderror</span>
                        </div>
                        <p></p>

					  <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                          <span class="text-danger">@error('address'){{ $message }} @enderror</span>
                      </div>
					  <div class="form-group row">
                          <label for="phone" class="col-md-3 col-form-label text-md-right">Phone</label>
                          <div class="col-md-8">
                          <input type="tel" class="form-control" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="job" class="col-md-3 col-form-label text-md-right">Job</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="job" placeholder="Enter job" value="{{ old('job') }}">
                          <span class="text-danger">@error('job'){{ $message }} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="salary" class="col-md-3 col-form-label text-md-right">Salary</label>
                          <div class="col-md-8">
                          <input type="number" class="form-control" name="salary" placeholder="Enter salary" value="{{ old('salary') }}">
                          <span class="text-danger">@error('salary'){{ $message }} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group">
                            <label for="married">Relationship Status</label>
                            <p></p>
                            <div class="from-check form-check-inline">
                                <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="married" id="single" value="0" {{ old('married') == '0' ? 'checked' : ''}}>
                                <label for="single" class="form-check-label">Single</label>
                            </div>
                            <div class="from-check form-check-inline">
                                <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="married" id="marriedD" value="1" {{ old('married') == '1' ? 'checked' : ''}}>
                                <label for="marriedD" class="form-check-label">Married</label>
                                <span class="text-danger">@error('married'){{ $message }} @enderror</span>
                            </div>
                      </div>

                      <div class="form-group">
                        <label for="IDCard">เลขบัตรประชาชน</label>
                        <input type="text" class="form-control" name="IDCard" placeholder="Enter IDCard" value="{{ old('IDCard') }}">
                        <span class="text-danger">@error('IDCard'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="IDCard_back">รหัสหลังบัตรประชาชน</label>
                        <input type="text" class="form-control" name="IDCard_back" placeholder="Enter IDCard_back" value="{{ old('IDCard_back') }}">
                        <span class="text-danger">@error('IDCard_back'){{ $message }} @enderror</span>
                    </div>

                     <!-- php  -->
                     <?php 
                        $sql = "SELECT * FROM banklist";
                        $post=DB::select($sql);
                        ?>
                        <!-- end php  -->

                    <div class="form-group">
                        <label for="bank">ธนาคาร</label>
                        <select id="comboA" onchange="getComboA(this)" type="text"  class="form-control" name="bank" placeholder="Enter Bank" value="{{ old('bank') }}">
                        @foreach($post as $item)
                        <option value="{{$item -> bankname}} "   >{{$item -> bankname}}</option>
                        @endforeach
                        </select>
                        <span class="text-danger">@error('bank'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="IDBank">เลขที่บัญชีธนาคาร</label>
                        <input type="text" class="form-control" name="IDBank" placeholder="Enter IDBank" value="{{ old('IDBank') }}">
                        <span class="text-danger">@error('IDBank'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="image_IDCard">รูปบัตรประชาชนตัวจริง</label>
                        <input type="file" name="image_IDCard" class="form-control">  
                    </div>

                    <div class="form-group">
                        <label for="image_face">ถ่ายรูปหน้าตรงคู่กับบัตรประชาชน</label>
                        <input type="file" name="image_face" class="form-control">  
                    </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                      </div>
                      <!-- <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                    </div> -->
					<div class="form-group row">
                            <label for="password-confirm" class="col-md-6 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-primary">Register</button>
                      </div>
                      <br>
                      <a href="{{ url('/multi') }}">I already have an account</a>
                  </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    @if (Session::has('success'))
                        <script>
                            swal("Congrate!","{!! Session::get('success') !!}","success",{
                            button:"OK",
                            });             
                        </script>
                    @endif
                    @if (Session::get('fail'))
                        <script>
                            swal("Sorry Fail!","{!! Session::get('fail') !!}","warning",{
                            button:"OK",
                            });             
                        </script>
                    @endif
</body>
</html>