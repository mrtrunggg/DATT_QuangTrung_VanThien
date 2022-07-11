<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
</head>
<body>
    <!-- Form without bootstrap -->
    
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Sign In
                    </h2>
                    <div class="auth-external-container">
                        {{-- <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> --}}
                        <p class="auth-sgt">or sign in with:</p>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                                {{ session('message') }}
                        </div>
                    @endif
                    <form class="login-form" action="{{ route('admin.login.post') }}" method="POST" role="form">
                        @csrf
                        <div class="mg-dangnhap">
                            <input class="auth-form-input" type="email" id="email" name="email" placeholder="Email" autofocus value="{{ old('email') }}">
                            @if($errors->has('email'))
                                {{$errors->first('email')}}
                            @endif
                        </div>
                        <div class="mg-dangnhap">
                            <div class="input-icon">
                                <input class="auth-form-input" type="password" id="password" name="password" placeholder="Password">
                                <i class="fa fa-eye show-password"></i>
                                @if($errors->has('password'))
                                {{$errors->first('password')}}
                            @endif
                            </div>
                        </div>
                        <label class="btn active">
                            <input type="checkbox" name='remember' checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i> 
                            <span> Remember password.</span>
                        </label>
                        <div class="footer-action">
                            <input type="submit" value="Sign In" class="auth-submit">
                        </div>
                    </form>
                    <div class="auth-forgot-password">
                        <a href="{{route('auth.forgetPass')}}">Forfot Password</a>
                    </div>
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





