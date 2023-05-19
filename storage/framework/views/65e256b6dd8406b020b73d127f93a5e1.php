
<?php $__env->startSection('content'); ?>
<div>
    <form action="" method="post">
        <div id="login-form">
            <h2 style="align-self:flex-start;">ĐĂNG NHẬP</h2>
       <p>Tên tài khoản</p>
        <input class="input-btn" placeholder="nhập tài khoản" type="text" name="tk" id="tk">
      <p>Mật khẩu</p>
        <input class="input-btn" placeholder="nhập mật khẩu" type="password" name="mk" id="mk">
        </div>
        <div id="login-btn">
        <button class="btn-login" type="submit">Đăng nhập</button>
        <button  class="btn-login" type="submit">Đăng ký</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('headerpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webgame\resources\views/login.blade.php ENDPATH**/ ?>
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
<main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.custom') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                           autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                </div>
                                <div class="d-grid mx-auto">
                                    <a class="nav-link text-dark text-center" href="{{ route('register') }}" >Sign Up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
