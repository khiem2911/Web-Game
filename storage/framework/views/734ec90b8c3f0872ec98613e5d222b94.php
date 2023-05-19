<!DOCTYPE html>
<html>
<head>
    <title>FuGame-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" >
        <div style="flex:1">
        <div class="header">
        <div class="banner">
            <h2><img style="width:50px;height:50px;" src="<?php echo e(asset('assets/img/shopgame.png')); ?>" > Fugame Shop</h2>
            <div style="display:flex;flex-direction:flex">
            <input type="search" placeholder="Tìm kiếm sản phẩm" name="search" id="">
            <a id="btn-search" href=""><i class="fas fa-search"></i></a>
            </div>
            <a href=""> Đăng nhập/Đăng ký</a>
            <a id="cart" href=""><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
        </div>  
        <div class="banner">
            <div class="right-menu">
            <a id="menu-btn" href=""><i class="fas fa-bars" style="padding-right:5px;"></i>Danh Mục</a>
            <div class="dropdown-menu">
                <a href="">Kinh dị</a>
                <a href="">Hành động</a>
                <a href="">Thế giới mở</a>
                <a href="">Sinh tồn</a>
            </div>
            </div>
            <a href=""><i class="fas fa-fire"></i> Sản phẩm mua nhiều</a>
            <a href=""><i class="fas fa-percent"></i> Sản phẩm khuyến mãi</a>
        </div>  
        </div>   
        <div class="container">
            <div class="img-container">
                <img src="<?php echo e(asset('assets/img/game1.jpg')); ?>" alt="">
                <img src="<?php echo e(asset('assets/img/game4.jpg')); ?>" alt="">
                <img src="<?php echo e(asset('assets/img/game7.jpg')); ?>" alt="">
                <img src="<?php echo e(asset('assets/img/game5.jpeg')); ?>" alt="">
            </div>
        </div>
        </div>
        </div>
    </nav>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\webgame\resources\views/dashboard.blade.php ENDPATH**/ ?>