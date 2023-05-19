@extends('headerpage')
@section('content')
@if(!empty($thongBao))
    <script>alert("Cập nhật thành công")</script>
@endif
<div  class="containerInfo">
  <div style="display:flex;flex-direction:'row';padding-bottom: 30px;">
  <h2>Tổng quan </h2>
  <img style="width:150px;height:150px;padding-left:10px" src="{{asset('assets/img/'.$data->avatar) }}" alt="" srcset="">
</div>
<div  class="first-info">
  <p>Họ và Tên</p>
  <p>Số điện thoại</p>
  <p>Ngày tham gia</p>
  <p>Email</p>
  <p>Tiền tích lũy</p>
</div>
<div  class="first-info">
<p>{{$data->fullname}}</p>
<p>{{$data->phone}}</p>
<p>{{$data->datecreate}}</p>
<p>{{$data->email}}</p>
<p>{{$data->moneyaccount}}Đ</p>
</div>
  </div>
  <a style="color:'black'" href="{{URL::to('/viewHistory')}}">Lịch sử mua hàng</a>
  <h3 class="card-header text-center">TỔNG QUAN</h3>
                        <div class="card-body">
                            <form action="{{ route('updateUser') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input value="{{$data->fullname}}" type="text" placeholder="Name" id="name" class="form-control" name="fullname"
                                           required autofocus>
                                    @if ($errors->has('fullname'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input value="{{$data->email}}" type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" >
                                </div>
                                <div class="form-group mb-3">
                                    <input value="{{$data->phone}}" type="text" placeholder="PhoneNumber" id="PhoneNumber" class="form-control"
                                           name="phone" required>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
<p></p>
<span>

</span>  
   
@endsection
<style>
    table td {
  border:1px solid black;
  
}
.w-5
{
  display: none;
}
.flex .justify-between
{
  display: none;
}
.px-2
{
  display: none;
}
</style>