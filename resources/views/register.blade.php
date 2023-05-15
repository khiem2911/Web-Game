@extends('headerpage')
@section('content')
<div>
    <form action="" method="post">
        <div id="login-form">
            <h2 style="align-self:flex-start;">ĐĂNG KÝ</h2>
       <p>Tên tài khoản</p>
        <input class="input-btn" placeholder="nhập tài khoản" type="text" name="tk" id="tk">
        <p>Họ tên</p>
        <input class="input-btn" placeholder="nhập họ tên" type="text" name="name" id="name">
        <p>Số điện thoại</p>
        <input class="input-btn" placeholder="nhập số điện thoại" type="number" name="phone" id="phone">
        <p>Email</p>
        <input class="input-btn" placeholder="nhập email" type="text" name="email" id="email">
        <p>Avatar</p>
        <input class="input-btn" type="file" name="img" id="img">
      <p>Mật khẩu</p>
        <input class="input-btn" placeholder="nhập mật khẩu" type="password" name="mk" id="mk">
        </div>
        <div id="login-btn">
        <button class="btn-login" type="submit">Đăng ký</button>
        </div>
    </form>
</div>
@endsection