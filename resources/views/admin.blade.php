<p>Chào mừng đến với admin</p>
@if (Auth::check())
    xin chào admin:{{Auth::guard('taikhoan')->email}}
@endif