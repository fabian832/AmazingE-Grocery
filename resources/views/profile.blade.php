@extends('navbar')
@section('title', 'Profile')
@section('page', '/profile')
@section('page_id', '/profile/id')
@section('content')
    <h2 style="text-align: center; margin-top:40px;">{{__('pageLanguage.profile.Profile')}}</h2>
    <div class="profile-layout">
        <img src="{{Storage::url('public/'.Auth::user()->display_picture_link)}}">
        <div class="profile-form">
            <form action ='/update_profile' method="POST" enctype="multipart/form-data" class="row g-3">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <label for="first_name" class="form-label">{{__('pageLanguage.profile.First Name')}}</label>
                    <input type="text" class="form-control" name="first_name" id="first_name">
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">{{__('pageLanguage.profile.Last Name')}}</label>
                    <input type="text" class="form-control" name="last_name" id="last_name">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">{{__('pageLanguage.profile.Email')}}</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="col-md-6">
                    @foreach ($roles as $role)
                        @if(Auth::user()->role_id == $role->role_id)
                            <label for="role" class="form-label">{{__('pageLanguage.profile.Role')}}</label>
                            <select id="role" class="form-select" name="role" aria-label="Disabled select example" disabled>
                                <option selected>{{$role->role_name}}</option>
                            </select>
                        @endif
                    @endforeach
                    
                </div>
                <div class="col-md-6">
                    <p>{{__('pageLanguage.profile.Gender')}}</p>
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
                    <label for="display_picture" class="form-label">{{__('pageLanguage.profile.Display Picture')}}</label>
                    <input type="file" class="form-control" name="display_picture" id="display_picture">
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">{{__('pageLanguage.profile.Password')}}</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">{{__('pageLanguage.profile.Confirm Password')}}</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{__('pageLanguage.profile.Save')}}</button>
                </div>
            </form>
            @if ($errors->any())
                <h2 style="color:red; opacity: 70%; font-size:20px;">{{$errors->first()}}</h2>
            @endif
        </div>
    </div>
@endsection

