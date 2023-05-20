<!DOCTYPE html>
<html>
<head>
    <title>FuGame-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
<div style="width:100%;height:250px">
        <div class="header">
        <div class="banner">
            <a id="logohome"  href="{{route('welcome')}}"><img style="width:50px;height:50px;" src="{{ asset('assets/img/shopgame.png') }}" > Fugame Shop </a>
            <form action="/product" method="post">
            @csrf  
            <div style="display:flex;flex-direction:flex">
            <input type="search" placeholder="Tìm kiếm sản phẩm" name="search" id="">
            <button id="btn-search" type="submit"><i class="fas fa-search"></i></button>
            </div>
            </form>
            <div style="display:flex">
            
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="" href="{{ route('login') }}">Đăng nhập</a> /
                        <a class="" href="{{ route('register') }}">Đăng ký</a>
                    </li>
                    
                @else
                    <li class="nav-item">
                    <div class="dropdown">
            <a id="menu-btn" href="">{{ Auth::User()->username }}</a>
            <div class="dropdown-content">
            <b  style="color:black">Số dư tài khoản</b>
   <p style="color:black"><?php echo number_format( Auth::User()->moneyaccount ).'Đ' ?></p>
   <a href="{{route('favourite')}}">Sản phẩm yêu thích</a>
   <a href="{{URL::to('/ViewUser')}}">Hồ sơ</a>
    <a href="{{ route('signout') }}">Đăng xuất</a>
     </div>
</div>
                    </li>
                @endguest
            </ul>
            </div>
            <a id="cart" href="{{URL::to('/viewCart')}}"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
        </div>  
        <div class="banner">
            <div class="dropdown">
            <a id="menu-btn" href=""><i class="fas fa-bars" style="padding-right:5px;"></i>Danh Mục</a>
            <div class="dropdown-content">
            <a href="{{URL::to('/catePro/Kinh dị')}}">Kinh dị</a>
                <a href="{{URL::to('/catePro/Hành động')}}">Hành động</a>
                <a href="{{URL::to('/catePro/Thế giới mở')}}">Thế giới mở</a>
                <a href="{{URL::to('/catePro/Sinh tồn')}}">Sinh tồn</a>
            </div>
            </div>
            <a href="{{route('allgames')}}"><i class="fas fa-gamepad"></i> Games</a>
            <a href="{{route('newgame')}}">Sản phẩm mới</a>
            <a href="{{route('topgames')}}"><i class="fas fa-fire"></i> Sản phẩm mua nhiều</a>
            <a href="{{route('salegames')}}"><i class="fas fa-percent"></i> Sản phẩm khuyến mãi</a>
        </div>  
        </div>   
        </div>
         @yield('content')
</body>
</html>