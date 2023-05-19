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
  @foreach ($data['bill'] as $key=>$item) 
     <tr>
     <?php $sum = 0; ?>
    <td>{{$item->datesell}}</td>
    <td>{{$item->idbill}}</td>
    <td>@foreach ($data['chiTiet'] as $key=>$item1) 
    @if($item1->idbill==$item->idbill)
    <?php $sum += $item1->price; ?>
      <p>{{$item1->nameProduct}}<p>
        @endif
    @endforeach
    </td>
    <td>{{$sum}}</td>
  </tr>    @endforeach
  </table>
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