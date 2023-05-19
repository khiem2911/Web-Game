@if(!empty($data))
    @foreach ($data as $key=>$item) 
        <div class="info-product">
        <img style="width:250px;height:150px" src="{{URL::to('/assets/img/' .$item->imgPro)}}" alt="">
        <div class="detail-cart">
        <a style="color:black" href="{{URL::to('/detail/'.$item->nameProduct)}}">{{$item->nameProduct}}</a>
        <p ><?php echo $item->price*(100-$item->salePrice)/100?></p>
        </div>
        <button class='btn btnDelete'  data-id="{{$item->proid}}" data-cost="<?php echo $item->price*(100-$item->salePrice)/100;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
        @endforeach
        @endif