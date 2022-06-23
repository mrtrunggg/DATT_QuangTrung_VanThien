<div style="width:600px; margin:0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$id->tendangnhap}}</h2>
        <p>Email này giúp bạn lấy lại được mật khẩu của tài khoản của bạn</p>
        <p>Vui long Click vào link dưới đây để đặt lại mật khẩu</p>
        <p>
            
            <a href="{{ route('auth.getPass',['id' => $id->id, 'token' => $id->remember_token])}}"
                style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-weight:bold;">Đặt lại mật khẩu</a>
        </p>

    </div>
    
</div>