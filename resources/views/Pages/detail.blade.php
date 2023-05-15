@extends('headerpage')
@section('content')
<div class="detail">
@if(!empty($data))
<div id="imgDetail">
@foreach ($data as $key=>$item)
<img style="width:400px;height:200px" src="{{URL::to('/assets/img/'.$item->imgPro) }}" alt="">
@endforeach
</div>
<div class="headerDetail">
<div>
@foreach ($data as $key=>$item)
<p>Sản phẩm</p>
<h1>{{$item->nameProduct}}</h1>
<div class="littleDetail">
<i class="fas fa-box"></i>
<p  class="text">Tình trạng: {{$item->status}}</p>
</div>
<div class="littleDetail">
<i class="fas fa-tag"></i>
<p  class="text">Thể loại: {{$item->nameCate}}</p>
</div>
<div class="littleDetail">
<p class='price'> <?php echo number_format($item->price).'Đ' ?></p>
<button class='btn'><i class="fas fa-bell"></i></button>
<button class='btn'><i class="fas fa-heart"></i></button>
</div>
<div class="littleDetail">
<p  class="text">Mô tả: {{$item->description}}</p>
</div>
<div class="btnCart">
<button id="btn-checkout"><p style="color:white"><i class="fas fa-credit-card" style="color:white"></i>Mua ngay</p></button>
<button id="btn-addnow"><p style="color:#5c9bf5"><i class="fas fa-cart-plus" style="color:#5c9bf5"></i>Thêm vào giỏ</p></button>
</div>
</div>
@endforeach
</div>
@endif
</div>
<div >
   <h2>Sản phẩm liên quan</h2>
   <div class="detailRelate">
   @if(!empty($relate))
   @foreach ($relate as $key=>$item)
   <a href="{{URL::to('/detail/'.$item->nameProduct)}}">
<img style="width:400px;height:200px" src="{{URL::to('/assets/img/'.$item->imgPro) }}" alt="">
</a>
@endforeach
   @endif
   </div>
</div>
@endsection