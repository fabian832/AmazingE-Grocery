@extends('navbar')
@section('title', 'Register')
@section('page', '/register-page')
@section('page_id', '/register-page/id')
@section('content')
    <div class="register-form">
        <h2>{{__('pageLanguage.register.Register')}}</h2>
        <form action ="/register-page" method="POST" enctype="multipart/form-data" class="row g-3">
            {{ csrf_field() }}
            <div class="col-md-6">
                <label for="first_name" class="form-label">{{__('pageLanguage.register.First Name')}}</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">{{__('pageLanguage.register.Last Name')}}</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">{{__('pageLanguage.register.Email')}}</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="col-md-6">
                <label for="role" class="form-label">{{__('pageLanguage.register.Role')}}</label>
                <select id="role" class="form-select" name="role">
                    <option selected>{{__('pageLanguage.register.Choose Role')}}</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <div class="col-md-6">
                <p>{{__('pageLanguage.register.Gender')}}</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="1" id="gender_male">
                    <label class="form-check-label" for="gender_male"> Male </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="2" id="gender_female">
                    <label class="form-check-label" for="gender_female"> Female </label>
                </div>
            </div>
            <div class="col-md-6">
                <label for="display_picture" class="form-label">{{__('pageLanguage.register.Display Picture')}}</label>
                <input type="file" class="form-control" name="display_picture" id="display_picture">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">{{__('pageLanguage.register.Password')}}</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">{{__('pageLanguage.register.Confirm Password')}}</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">{{__('pageLanguage.register.Register')}}</button>
            </div>
        </form>
        @if ($errors->any())
            <h2 style="color:red; opacity: 70%; font-size:20px;">{{$errors->first()}}</h2>
        @endif
    </div>
    
@endsection

