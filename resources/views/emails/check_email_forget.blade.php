<div style="width:600px; margin:0 auto">
    <div style="text-align: center">
        <h2>Hello {{$id->tendangnhap}}</h2>
        <p>This email helps you to recover your account's password</p>
        <p>Please Click on the link below to reset your password</p>
        <p>
            
            <a href="{{ route('auth.getPass',['id' => $id->id, 'token' => $id->remember_token])}}"
                style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-weight:bold;">Reset Password</a>
        </p>

    </div>
    
</div>