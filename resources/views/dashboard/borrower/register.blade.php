<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrower Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                  <h4>Borrower Register</h4><hr>
                  <form action="{{ route('borrower.create') }}" method="post" autocomplete="off">
                    @csrf
                      <div class="form-group row">
                          <label for="firstname" class="col-md-3 col-form-label text-md-right">FirstName</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="firstname" placeholder="Enter firstname" value="{{ old('firstname') }}">
                          <span class="text-danger">@error('firstname'){{ $message }} @enderror</span>
                          </div>
                      </div>
					  <div class="form-group row">
                          <label for="lastname"class="col-md-3 col-form-label text-md-right">LastName</label>
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
                            <input type="date" id="birthday" name="birthday" class="from-control @error('birthday') is-invalid @enderror" value="{{ old('birthday') }}">
                            <span class="text-danger">@error('birthday'){{ $message }} @enderror</span>
                        </div>
                        <p></p>

					  <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                          <span class="text-danger">@error('address'){{ $message }} @enderror</span>
                      </div>
					  <div class="form-group row">
                          <label for="phone" class="col-md-2 col-form-label text-md-right">Phone</label>
                          <div class="col-md-8">
                          <input type="tel" class="form-control" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="job" class="col-md-2 col-form-label text-md-right">Job</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="job" placeholder="Enter job" value="{{ old('job') }}">
                          <span class="text-danger">@error('job'){{ $message }} @enderror</span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="salary" class="col-md-2 col-form-label text-md-right">Salary</label>
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

                    <div class="form-group">
                        <label for="bank">ธนาคาร</label>
                        <input type="text" class="form-control" name="bank" placeholder="Enter Bank" value="{{ old('bank') }}">
                        <span class="text-danger">@error('bank'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="IDBank">เลขที่บัญชีธนาคาร</label>
                        <input type="text" class="form-control" name="IDBank" placeholder="Enter IDBank" value="{{ old('IDBank') }}">
                        <span class="text-danger">@error('IDBank'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="image_IDCard">รูปบัตรประชาชนตัวจริง</label>
                        <input type="file" name="image_IDCard" class="form-control" id="image_IDCard">  
                    </div>

                    <div class="form-group">
                        <label for="image_face">ถ่ายรูปหน้าตรงคู่กับบัตรประชาชน</label>
                        <input type="file" name="image_face" class="form-control" id="image_face">  
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
                            <label for="password-confirm" class="col-md-5 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Register</button>
                      </div>
                      <br>
                      <a href="{{ url('/multi') }}">I already have an account</a>
                  </form>
            </div>
        </div>
    </div>
    
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