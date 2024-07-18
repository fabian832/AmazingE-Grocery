@extends('navbar')
@section('title', 'Cart')
@section('page', '/cart')
@section('page_id', '/cart/id')
@section('content')
    @if (collect($cartItems)->first())
        <div class="cart-list">
            <div class="title">
                <p>{{__('pageLanguage.cart.My Cart')}}</p>
            </div>
            <?php
                $grandTotal = 0;
                $totalItems = 0;    
            ?>
            @foreach ($cartItems as $item)
            <div class="cart-detail">
                <div class="left content">
                    <img src="{{Storage::url('images/items/' . $item->item_id . '.jpg')}}">
                </div>
                <div class="middle content">
                    <h3>{{$item->item_name}}</h3>
                    <p>{{__('pageLanguage.cart.Price')}}{{$item->price}}</p>

                    <?php
                        $grandTotal += $item->price;
                        $totalItems++;    
                    ?>
                </div>
                <div class="right content">
                    <form action="/delete-from-cart/{{$item->item_id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{__('pageLanguage.cart.Delete')}}</button>
                    </form>
                </div>
            </div>
            @endforeach
            <h3>{{__('pageLanguage.cart.Grand Total')}} {{$grandTotal}}</h3>

            <form action="/checkout" method="post">
                {{ csrf_field() }}
                <input type="submit" value="{{__('pageLanguage.cart.Checkout')}} ({{$totalItems}})" class="btn btn-warning">
            </form>
            
        </div>
    @else
        <div class="cart-list"> 
            <div class="title">
                <p>{{__('pageLanguage.cart.Empty')}}</p>
            </div>
        </div>   
    @endif
@endsection

