
<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('headerpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webgame\resources\views/register.blade.php ENDPATH**/ ?>
@extends('headerpage')
@section('content')
<?php
session_start();
if(session()->has('uid')) {
   ?><script>
        window.location="\allgames";
   </script>
   <?php
}
?>
<main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Register User</h3>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="POST" enctype=" ">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="username" id="username" class="form-control" name="username"
                                           required autofocus>
                                    @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="fullname" id="fullname" class="form-control" name="fullname"
                                           required autofocus>
                                    @if ($errors->has('fullname'))
                                        <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Comfirm Password" id="comfirmPassword" class="form-control"
                                           name="comfirmPassword" required>
                                    @if ($errors->has('comfirmPassword'))
                                        <span class="text-danger">{{ $errors->first('comfirmPassword') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="phone" id="phone" class="form-control"
                                           name="phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" placeholder="avatar" id="avatar" class="form-control"
                                           name="avatar" required>
                                    @if ($errors->has('avatar'))
                                        <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                                <div class="d-grid mx-auto">
                                    <a class="nav-link text-dark text-center" href="{{ route('login') }}" >Sign ip</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
