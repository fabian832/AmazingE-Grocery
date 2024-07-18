@extends('navbar')
@section('title', 'Alert')
@section('page', '/alert')
@section('page_id', '/alert/id')
@section('content')
    <div class="alert-page" style ="
    height: 300px;
    margin: 100px;
    padding-top:100px;
    border:1px solid rgb(213, 213, 213)">
        @if(Session::get('Page') == 'Register')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Registration succeed')}}</h2>
        @elseif (Session::get('Page') == 'Login')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Log in')}} {{Auth::user()->email}}</h2>
        @elseif (Session::get('Page') == 'Profile')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Update profile')}}</h2>
        @elseif (Session::get('Page') == 'Logout')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Log out')}}</h2>
        @elseif (Session::get('Page') == 'AddCart')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Add to cart')}}</h2>
        @elseif (Session::get('Page') == 'DeleteCart')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Delete item')}}</h2>
        @elseif (Session::get('Page') == 'NotAddCart')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Not Add Cart')}}</h2>
        @elseif (Session::get('Page') == 'Checkout')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Checkout')}}</h2>
        @elseif (Session::get('Page') == 'ValidateOwnAccountDelete')
            <h5 style="text-align: center">{{__('pageLanguage.alert.Question Delete Account')}}</h5>
            <h5 style="text-align: center">{{__('pageLanguage.alert.Question Delete and Logged Out')}}</h5>
            <h5 style="text-align: center">{{__('pageLanguage.alert.Question Back to Maintenance')}}</h5>
            <h5 style="text-align: center">{{__('pageLanguage.alert.Back to Home')}}</h5>
            <div class="truefalse" style="display: flex; justify-content: center;">
                <form action="/delete-user/{{Auth::user()->id}}/1" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" style = "margin:0 10px;">{{__('pageLanguage.alert.Yes')}}</button>
                </form>
                <a href="/account-maintenance" class="btn btn-primary" style = "margin:0 10px;">{{__('pageLanguage.alert.No')}}</a>
            </div>
        @elseif (Session::get('Page') == 'LogoutDelete')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Log out and deleted')}}</h2>
        @elseif (Session::get('Page') == 'DeleteUser')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Delete user')}}</h2>
        @elseif (Session::get('Page') == 'UpdateRole')
            <h2 style="text-align: center">{{__('pageLanguage.alert.Update user')}}</h2>
        @endif
        <center><a href="/">{{__('pageLanguage.alert.Return to home')}}</a></center>
    </div>
@endsection

