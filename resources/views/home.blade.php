@extends('navbar')
@section('title', 'Amazing E-Grocery')
@section('page', '/')
@section('page_id', '/id')
@section('content')
    @auth
        <div class="search-item">
            <form action="/search" class="row g-3" method=get>
                <div class="col-md-11">
                    <input type="text" name="search" id="search" placeholder="{{__('pageLanguage.home.SearchProduct')}}" class="form-control">
                </div>
                <div class="col-md-1">
                    <input type="submit" value="{{__('pageLanguage.home.Search')}}" id="submit-search" class="form-control">
                </div>
            </form>
        </div>
        <div class="list-home">
            @foreach ($items as $item)
                <div class="item-home">
                    <div class="image">
                        <img src="{{Storage::url("images/items/".$item->item_id.".jpg")}}">
                    </div>
                    <div class="detail">
                        <center>
                            <p class= "item-name">{{$item->item_name}}</p>
                            <a href="/detail/{{$item->item_id}}" class="btn btn-info">{{__('pageLanguage.home.Detail')}}</a>
                        </center>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="list-paginator">
            {{$items->links()}}
        </div>
    @endauth
    <div class="banner">
        <img src="{{Storage::url("images/assets/banner-01.png")}}">
    </div>
@endsection

