@extends('header')
@section('content')
<div style="margin-top:50px;" class="main-productnew">
       <h1>GAMES</h1>
    </div>
<div id="pronew-main">
  @if(!empty($data))
    @foreach ($data as $key=>$item)
<div class="pronew">
          <a href="{{URL::to('/detail/'.$item->proId)}}">
        <img style="width:350px;height:200px" src="{{URL::to('/assets/img/' .$item->imgPro) }}" alt="">
        <p>{{$item->nameProduct}}</p>
        <p > <?php echo number_format($item->price).'Đ' ?></p>
        <form action="{{ URL::to('/destroylove/'.$item->proid) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>                
        </a>

       
       </div>
       
    @endforeach
    {{$data->links()}}
    @endif
    
    </div>
    <br>
@endsection