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
            <div style="display:flex;flex-direction:flex">
            <input type="search" placeholder="Tìm kiếm sản phẩm" name="search" id="">
            <a id="btn-search" href=""><i class="fas fa-search"></i></a>
            </div>
            <div style="display:flex;justify-content:center;align-items: center;">
            <i class="far fa-user" ></i>
            <a  style="padding-left:10px" href="<?php echo e(route('login')); ?>">Đăng nhập</a>
            <a href="<?php echo e(route('register')); ?>">/Đăng ký</a>
            </div>
            <a id="cart" href="<?php echo e(route('cart')); ?>"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
        </div>  
        <div class="banner">
            <div class="right-menu">
            <a id="menu-btn" href=""><i class="fas fa-bars" style="padding-right:5px;"></i>Danh Mục</a>
            <div class="dropdown-menu">
                <a href="<?php echo e(URL::to('/catepro/Kinh dị')); ?>">Kinh dị</a>
                <a href="<?php echo e(URL::to('/catepro/Hành động')); ?>">Hành động</a>
                <a href="<?php echo e(URL::to('/catepro/Thế giới mở')); ?>">Thế giới mở</a>
                <a href="<?php echo e(URL::to('/catepro/Sinh tồn')); ?>">Sinh tồn</a>
            </div>
            </div>
            <a href="<?php echo e(route('allgame')); ?>"><i class="fas fa-gamepad"></i> Games</a>
            <a href="<?php echo e(route('newgame')); ?>">Sản phẩm mới</a>
            <a href="<?php echo e(route('topgames')); ?>"><i class="fas fa-fire"></i> Sản phẩm mua nhiều</a>
            <a href="<?php echo e(route('salegames')); ?>"><i class="fas fa-percent"></i> Sản phẩm khuyến mãi</a>

        </div>  
        </div>   
        </div>
         <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\Users\Admin\Desktop\Web-Game\resources\views/headerpage.blade.php ENDPATH**/ ?>