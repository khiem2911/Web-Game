@extends('headerpage')
@section('content')
@if(!empty($thongBao))
    <script>alert("Cập nhật thành công")</script>
@endif
<h3>TỔNG QUAN</h3>
<p>Ảnh đại diện</p>
<table>
    <tr>
    <th>THỜI GIAN</th>
    <th>MÃ ĐƠN HÀNG</th>
    <th>SẢN PHẨM</th>
    <th>TỔNG TIỀN</th>
  </tr>

     <tr>
    <td>{{$data->fullname}}</td>
    <td>{{$data->phone}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->datecreate}}</td>
  </tr>

  </table>
  <a href="{{URL::to('/ViewUser')}}">Sinh tồn</a>
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