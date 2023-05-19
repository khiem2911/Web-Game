
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