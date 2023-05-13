@extends('headerpage')
@section('content')
<h1 style="margin-left:100px;">GIỎ HÀNG</h1>
    <div class="cart">
        <div class="test">
        <div class="info-product">
        <img style="width:250px;height:150px" src="{{asset('assets/img/game1.jpg') }}" alt="">
        <div class="detail-cart">
        <p>Atomeic heart</p>
        <p>99.000đ</p>
        </div>
        </div>
        <div class="info-product">
        <img style="width:250px;height:150px" src="{{asset('assets/img/game3.jpg') }}" alt="">
        <div class="detail-cart">
        <p>Beyond two soulds</p>
        <p>150.000đ</p>
        </div>
        </div>
        </div>
        <div class="info-cart">
            <div class="infocart">
            <p>Bạn có mã giới thiệu?</p>
            <i class="far fa-user"></i>
            </div>
            <div class="infocart">
                <p>Bạn có mã ưu đãi?</p>
                <i class="fas fa-percent"></i>
            </div>
            <div class="infocart">
                <p>Bạn muốn tặng cho bạn bè?</p>
                <i class="fas fa-gift"></i>
            </div>
            <div class="infocart">
                <p>Thanh toán</p>
                <p>200.000đ</p>
            </div>
            <button>Thanh toán</button>
        </div>
    </div>
@endsection