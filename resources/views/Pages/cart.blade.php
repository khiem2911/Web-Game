@extends('headerpage')
@section('content')
<h1  style="margin-left:100px; display: flex;">GIỎ HÀNG (<p class="btnThanhToan">{{$count}}</p>)</h1>
    <div class="cart">
        <div class="test">
        @if(!empty($data))
    @foreach ($data as $key=>$item) 
        <div class="info-product">
        <img style="width:250px;height:150px" src="{{URL::to('/assets/img/' .$item->imgPro)}}" alt="">
        <div class="detail-cart">
        <a style="color:black" href="{{URL::to('/detail/'.$item->nameProduct)}}">{{$item->nameProduct}}</a>
        <p ><?php echo $item->price*(100-$item->salePrice)/100?></p>
        </div>
        <button class='btn btnDelete'  data-id="{{$item->proid}}" data-cost="<?php echo $item->price*(100-$item->salePrice)/100;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
        @endforeach
        @endif
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
                <div style="display: flex;"><p id="total">{{$sum}} </p><p>  Đ</p></div>
            </div>
            <button class="btnPay">Thanh toán</button>
        </div>

    </div>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>
    <script>
        
        $('.test').on("click",".btnDelete", function()
            {
                var soTienTru = parseInt($(this).data('cost'));
                $.ajax({
                url: "/deleteCart/"+$(this).data("id"),
                type:'GET'}).
                done(function(data) {
                    $('.test').empty();
                    $('.test').html(data);
                    $('.btnThanhToan').html(Number($('.btnThanhToan').text())-1);
                    $('#total').html(parseInt($('#total').text())-soTienTru);
                });
            }
        );
        $(".btnPay" ).on( "click", function() {
            var btn =  parseInt($('.btnThanhToan').text())
            if(btn==0)
            {
                alert("Không có gì để thanh toán")
            }
            else
            {
                $.ajax({
                url: "/pay/",
                type:'GET'}).
                done(function(data) {
                    if(data=="Bạn không đủ tiền để mua")
                    {
                        alert(data)
                    }
                    else
                    {
                    $('body').html(data);
                    alert("Thanh toán thành công")
                    }
                });
            }
            
} );
    </script>
@endsection