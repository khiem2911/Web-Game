@extends('header')
@section('content')
<div style="margin-top:50px;" class="main-productnew">
       <h1>NEW GAMES</h1>
    </div>
<div id="pronew-main">
        <div class="pronew">
          <a href="">
        <img style="width:350px;height:200px" src="{{asset('assets/img/game1.jpg') }}" alt="">
        <p>Atomeic heart</p>
        <p>190.000</p>
        </a>
       </a>
        </div>
        <div  class="pronew">
        <a href="">
        <img style="width:350px;height:200px" src="{{asset('assets/img/game3.jpg') }}" alt="">
        <p>Beyond two sould</p>
        <p>200.000đ</p>
        </a>
        </div>
        <div  class="pronew">
          <a href="">
        <img style="width:350px;height:200px"  src="{{asset('assets/img/game4.jpg') }}" alt="">
        <p>Far cry 6</p>
       <p>390.000đ</p>
       </a>
        </div>
       
    </div>
@endsection