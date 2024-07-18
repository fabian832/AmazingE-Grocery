@extends('navbar')
@section('title', 'Login')
@section('page', '/login-page')
@section('page_id', '/login-page/id')
@section('content')
    <div class="login-form">
        <h2>{{__('pageLanguage.login.Login')}}</h2>
        <form action =
        @if (App::getLocale()=='en')
            '/login-page'
        @else
            '/login-page/id'
        @endif
        
        method="POST" class="row g-3">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label for="email" class="form-label">{{__('pageLanguage.login.Email Address')}}</label>
                <input type="text" class="form-control" name="email" id="email" value={{Cookie::get('email') != null ? Cookie::get('email') : ""}}>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">{{__('pageLanguage.login.Password')}}</label>
                <input type="password" class="form-control" name="password" id="password" value={{Cookie::get('password') != null ? Cookie::get('password') : ""}}>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name = "remember_me" id="remember_me">
                    <label class="form-check-label" for="remember_me">{{__('pageLanguage.login.Remember Me')}}</label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">{{__('pageLanguage.login.Login')}}</button>
            </div>
        </form>
        <a href="/register-page">{{__('pageLanguage.login.Sign up')}}</a>
        @if ($errors->any())
            <h2 style="color:red; opacity: 70%; font-size:20px;">{{$errors->first()}}</h2>
        @endif
    </div>
    
@endsection

