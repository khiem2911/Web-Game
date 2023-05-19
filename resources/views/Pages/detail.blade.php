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
<button id="btn-checkout"><p style="color:white;padding-left:10px;"><i class="fas fa-credit-card" style="color:white"></i>Mua ngay</p></button>
<<<<<<< HEAD
<button onclick="AddCart({{$item->proId}})" id="btn-addnow"><p style="color:#5c9bf5;padding-left:10px;"><i class="fas fa-cart-plus" style="color:#5c9bf5"></i>Thêm vào giỏ</p></button>
=======
<button id="btn-addnow"><p style="color:#5c9bf5;padding-left:10px;"><i class="fas fa-cart-plus" style="color:#5c9bf5"></i>Thêm vào giỏ</p></button>
>>>>>>> khiem
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
<<<<<<< HEAD

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>
<script>

   function AddCart(id) {
      console.log(id)
      $.ajax({
                url: "/addCart/"+id,
                type:'GET'}).
                done(function(data) {
                  
                if(data=="Chưa đăng nhập")
                {
                  window.location="/login";
                }
                else
                {
                  alert(data)
                }
                });
   }
   
    
</script>



@endsection
=======
@endsection
>>>>>>> khiem
