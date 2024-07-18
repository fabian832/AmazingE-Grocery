@extends('navbar')
@section('title', 'Detail Items')
@section('page', '/detail' . '/' . $item->item_id)
@section('page_id', '/detail/id' . '/' . $item->item_id)
@section('content')
    <div class="detail-product-section">    
        <div class="left">
            <div class="item-image">
                <img src="{{Storage::url('images/items/'.$item->item_id.'.jpg')}}">
            </div>
        </div>
        <div class="right">
            <div class="item-title">
                <p>{{$item->item_name}}</p>
            </div>
            <div class="item-price">
                <h3>{{__('pageLanguage.detail.Price')}} {{$item->price}}</h3>
            </div>
            <div class="item-description">
                <p>{{$item->item_desc}}</p>
            </div>
            <div class="item-qty">
                <form action="/add-to-cart/{{$item->item_id}}" method="post">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-warning" id = "submit" value="{{__('pageLanguage.detail.Add to Cart')}}">
                </form>
            </div>
        </div>
    </div>
@endsection

