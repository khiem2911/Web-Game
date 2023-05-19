<!DOCTYPE html>
<html>
<head>
    <title>FuGame-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
<div style="width:100%;height:250px">
        <div class="header">
        <div class="banner">
            <a id="logohome"  href="<?php echo e(route('welcome')); ?>"><img style="width:50px;height:50px;" src="<?php echo e(asset('assets/img/shopgame.png')); ?>" > Fugame Shop </a>
            <form action="/product" method="post">
            <?php echo csrf_field(); ?>  
            <div style="display:flex;flex-direction:flex">
            <input type="search" placeholder="Tìm kiếm sản phẩm" name="search" id="">
            <button id="btn-search" type="submit"><i class="fas fa-search"></i></button>
            </div>
            </form>
            <div style="display:flex">
            
            <ul class="navbar-nav">
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="" href="<?php echo e(route('login')); ?>">Đăng nhập</a> /
                        <a class="" href="<?php echo e(route('register')); ?>">Đăng ký</a>
                    </li>
                    
                <?php else: ?>
                    <li class="nav-item">
                    <div class="dropdown">
            <a id="menu-btn" href=""><?php echo e(Auth::User()->username); ?></a>
            <div class="dropdown-content">
            <b  style="color:black">Số dư tài khoản</b>
   <p style="color:black"><?php echo number_format( Auth::User()->moneyaccount ).'Đ' ?></p>
   <a href="<?php echo e(route('favourite')); ?>">Sản phẩm yêu thích</a>
   <a href="<?php echo e(URL::to('/ViewUser')); ?>">Hồ sơ</a>
    <a href="<?php echo e(route('signout')); ?>">Đăng xuất</a>
     </div>
</div>
                    </li>
                <?php endif; ?>
            </ul>
            </div>
            <a id="cart" href="<?php echo e(URL::to('/viewCart')); ?>"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
        </div>  
        <div class="banner">
            <div class="dropdown">
            <a id="menu-btn" href=""><i class="fas fa-bars" style="padding-right:5px;"></i>Danh Mục</a>
            <div class="dropdown-content">
            <a href="<?php echo e(URL::to('/catePro/Kinh dị')); ?>">Kinh dị</a>
                <a href="<?php echo e(URL::to('/catePro/Hành động')); ?>">Hành động</a>
                <a href="<?php echo e(URL::to('/catePro/Thế giới mở')); ?>">Thế giới mở</a>
                <a href="<?php echo e(URL::to('/catePro/Sinh tồn')); ?>">Sinh tồn</a>
            </div>
            </div>
            <a href="<?php echo e(route('allgames')); ?>"><i class="fas fa-gamepad"></i> Games</a>
            <a href="<?php echo e(route('newgame')); ?>">Sản phẩm mới</a>
            <a href="<?php echo e(route('topgames')); ?>"><i class="fas fa-fire"></i> Sản phẩm mua nhiều</a>
            <a href="<?php echo e(route('salegames')); ?>"><i class="fas fa-percent"></i> Sản phẩm khuyến mãi</a>
            <a href="<?php echo e(route('favourite')); ?>"><i class="fas fa-heart"></i> Sản phẩm yêu thích</a>
        </div>  
        </div>   
        </div>
         <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\Users\Admin\Desktop\Web-Game\resources\views/headerpage.blade.php ENDPATH**/ ?>