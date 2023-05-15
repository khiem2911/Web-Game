@extends('header')
@section('content')
<div style="margin-top:50px;" class="main-productnew">
       <h1>SALE GAMES</h1>
    </div>
<div id="pronew-main">
  @if(!empty($data))
    @foreach ($data as $key=>$item)
<div class="pronew">
 <a href="{{URL::to('/detail/'.$item->nameProduct)}}">        
  <img style="width:350px;height:200px" src="{{URL::to('/assets/img/' .$item->imgPro) }}" alt="">
        <p>{{$item->nameProduct}}</p>
        <p class='price'> <?php echo number_format($item->price).'Đ' ?></p>
        <p><?php echo (number_format(($item->price*(100-$item->salePrice)/100))).'Đ' ?></p>
        </a>
       </a>
       </div>
    @endforeach
    {{$data->links()}}
    @endif
    </div>
@endsection