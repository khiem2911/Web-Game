@extends('header')
@section('content')
<div style="margin-top:50px;" class="main-productnew">
       <h1>NEW GAMES</h1>
    </div>
<div id="pronew-main">
        <div class="pronew">
        <img style="width:350px;height:200px" src="{{asset('assets/img/game1.jpg') }}" alt="">
        <p>Atomeic heart</p>
       <a href="">190.000đ</a>
        </div>
        <div  class="pronew">
        <img style="width:350px;height:200px" src="{{asset('assets/img/game3.jpg') }}" alt="">
        <p>Beyond two sould</p>
        <a href="">200.000đ</a>
        </div>
        <div  class="pronew">
        <img style="width:350px;height:200px"  src="{{asset('assets/img/game4.jpg') }}" alt="">
        <p>Far cry 6</p>
       <a href="">390.000đ</a>
        </div>
        <div  class="pronew">
        <img style="width:350px;height:200px"  src="{{asset('assets/img/game5.jpeg') }}" alt="">
        <p>Leauge of legends</p>
      <a href="">100.000đ</a>
        </div>
    </div>
@endsection