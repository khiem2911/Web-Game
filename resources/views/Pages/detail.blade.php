@extends('headerpage')
@section('content')
@if(!empty($check))

@endif
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
<p > <?php echo number_format($item->price).'Đ' ?></p>
<button class='btn'><i class="fas fa-bell"></i></button>
<a href="{{URL::to('/add/'.$item->proId)}}"><button class='btn'><i class="fas fa-heart"> </i></button></a>
</div>
<div class="littleDetail">
<p  class="text">Mô tả: {{$item->description}}</p>
</div>
<div class="btnCart">
<a href= "{{URL::to('/viewCart')}}" ><i class="fa-solid fa-credit-card" style="color:white"></i>Mua ngay</a>
<button onclick="AddCart({{$item->proId}})" id="btn-addnow"><p style="color:#5c9bf5;padding-left:10px;"><i class="fas fa-cart-plus" style="color:#5c9bf5"></i>Thêm vào giỏ</p></button>
</div>
</div>
@endforeach
</div>
@endif
</div>
<div style="margin-left:100px;margin-right:100px;">
@foreach ($data as $key=>$item)
<form action="{{ route('store')}}" method="POST" class="mt-5">
        <h2>Bình luận</h2>
    @csrf
                <div class="mb-4">
                    <input type="text"  class="form-control" id="content" name="content">
                </div>
                
                <input placeholder="Nhập nội dung bình luận" type="hidden" value="{{$item->proId}}" name="proid" id="product_id">
                <button style="margin-bottom:20px" id="btn-checkout"><p style="color:white"><i class="fas fa-paper-plane"></i>Send</p></button>
    </form>
    </div>

    @endforeach
    @if(!empty($comment))
    <div style="margin-left:100px;margin-right:100px;">
    </div>
            @foreach ($comment as $comments)
            <div style="display:flex;flex-direction:'row'">
            <img style="width:80px;border-radius:100%;margin-left:30px" src="{{asset('assets/img/'.$comments->avatar) }}" alt="" srcset="">
    <p>{{ $comments->username }}</p>
    </div>
            <p  style="padding-left:130px">{{ $comments->content }}</p>
                @endforeach
            </div>
    </div>
    @endif

<div >
<h2 style="margin-left:100px;">Sản phẩm liên quan</h2>

   <div class="detailRelate">
   @if(!empty($relate))
   @foreach ($relate as $key=>$item)
   <a href="{{URL::to('/detail/'.$item->nameProduct)}}">
<img style="width:230px;height:150px;" src="{{URL::to('/assets/img/'.$item->imgPro) }}" alt="">
</a>
@endforeach
   @endif
   </div>
</div>

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
   var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>



@endsection
