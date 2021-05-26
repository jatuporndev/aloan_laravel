<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                  <h4>Admin Register</h4><hr>
                  <form action="{{ route('admin.create') }}" method="post" autocomplete="off">
                    @if (Session::get('success'))
                         <div class="alert alert-success">
                             {{ Session::get('success') }}
                         </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                      <div class="form-group">
                          <label for="firstname">FName</label>
                          <input type="text" class="form-control" name="firstname" placeholder="Enter f name" value="{{ old('firstname') }}">
                          <span class="text-danger">@error('firstname'){{ $message }} @enderror</span>
                      </div>
					  <div class="form-group">
                          <label for="lastname">LName</label>
                          <input type="text" class="form-control" name="lastname" placeholder="Enter L name" value="{{ old('lastname') }}">
                          <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
                      </div>
					  <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                          <span class="text-danger">@error('address'){{ $message }} @enderror</span>
                      </div>
					  <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="tel" class="form-control" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Register</button>
                      </div>
                      <br>
                      <a href="{{ route('admin.login') }}">I already have an account</a>
                  </form>
            </div>
        </div>
    </div>
    
</body>
</html>