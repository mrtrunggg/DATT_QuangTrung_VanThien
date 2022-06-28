<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- Form without bootstrap -->
    
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Forget Password
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <p> Please enter your registered email</p>
                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                                {{ session('message') }}
                        </div>
                    @endif
                    <form class="login-form" action="" method="POST" role="form">
                        @csrf
                        <div class="mg-dangnhap">
                            <input class="auth-form-input" type="email" id="email" name="email" placeholder="Email" autofocus value="{{ old('email') }}">
                            @error('email') <small class ="help-block">{{$message}}</small>@enderror
                        </div>
                        <div class ="footer-action">
                        <button type ="submit" class="btn btn-primary" >Send</button> 
                       
                            <a href="{{ route('auth.show')}}" class="auth-btn-direct">Sign In</a>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div >
                    <img src="{{ asset('backend/image/vector.jpg') }}" alt="login" width="320" height="550">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/js/common.js') }}"></script>
</body>
</html>