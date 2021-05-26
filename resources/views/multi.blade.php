<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALOAN</title>
    <link rel="icon" href="img/rsalogo.png" type="image/png">
    <link rel="stylesheet" href="css/multi.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Loaner Form</h3>
                    <form action="{{ route('loaner.check') }}" method="post" autocomplete="off">
                    <!-- @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif -->
                    @csrf
                        <div class="form-group">
                            <label for="email" class="btnForgetPwd">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="btnForgetPwd">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btnSubmit">Login</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('loaner.register') }}" class="btnForgetPwd">Create new Account</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="img/alogo.png" alt=""/>
                    </div>
                    <h3>Borrower From</h3>
                    <form action="{{ route('borrower.check') }}" method="post" autocomplete="off">
                    @csrf
                        <div class="form-group">
                            <label for="email" class="btnForgetPwd">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="btnForgetPwd">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btnSubmit">Login</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('borrower.register') }}" class="btnForgetPwd">Create new Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @if (Session::get('fail'))
            <script>
                    swal("Sorry Fail!","{!! Session::get('fail') !!}","error",{
                    button:"OK",
                    });             
            </script>
         @endif
        @if (Session::get('fail1'))
            <script>
                    swal("Sorry Fail!","{!! Session::get('fail1') !!}","error",{
                        button:"OK",
                        });             
                    </script>
            @endif            
</body>
</html>
