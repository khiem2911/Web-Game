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
<p class='price'> <?php echo number_format($item->price).'Đ' ?></p>
<button class='btn'><i class="fas fa-bell"></i></button>
<a href="{{URL::to('/add/'.$item->proId)}}"><button class='btn'><i class="fas fa-heart"> </i></button></a>
</div>
<div class="littleDetail">
<p  class="text">Mô tả: {{$item->description}}</p>
</div>
<div class="btnCart">
<button id="btn-checkout"><p style="color:white;padding-left:10px;"><i class="fas fa-credit-card" style="color:white"></i>Mua ngay</p></button>
<button id="btn-addnow"><p style="color:#5c9bf5;padding-left:10px;"><i class="fas fa-cart-plus" style="color:#5c9bf5"></i>Thêm vào giỏ</p></button>
</div>
</div>
@endforeach
</div>
@endif
</div>
@foreach ($data as $key=>$item)
<form action="{{ route('store')}}" method="POST" class="mt-5">
        <h1>Commentator</h1>
    @csrf
                <div class="mb-4">
                    <label for="content" class="form-label">Content</label>
                    <input type="text"  class="form-control" id="content" name="content">
                </div>
                
                <input type="hidden" value="{{$item->proId}}" name="proid" id="product_id">
                <button type="submit" class="btn btn-success">Send</button>
    </form>
    @endforeach
    <table class="table mt-5">
            <h1>Comment</h1>
            <thead>

                <td>Content</td>
                
            </thead>
            <tr>
            @foreach ($comment as $comments)
                <td>{{ $comments->content }}</td>
                @endforeach
            </tr>
        </table>
        
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