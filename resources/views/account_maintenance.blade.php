@extends('navbar')
@section('title', 'Account Maintenance')
@section('page', '/account-maintenance')
@section('page_id', '/account-maintenance/id')
@section('content')
    <div class="acc-list">
        <div class="title">
            <p>{{__('pageLanguage.account_maintenance.Account Maintenance')}}</p>
        </div>
        @foreach ($users as $user)
        <div class="acc-detail">
            <div class="left content">
                <img src="{{Storage::url($user->display_picture_link)}}">
            </div>
            <div class="middle content">
                <p>{{$user->first_name}} {{$user->last_name}} - {{$user->role_name}}</p>
            </div>
            <div class="right content">
                <a href="/update-role/{{$user->id}}" class="btn btn-warning" style="width: 100px !important; margin-bottom:30px;">{{__('pageLanguage.account_maintenance.Update')}}</a>
                <form action="/delete-user/{{$user->id}}/0" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="width: 100px !important;">{{__('pageLanguage.account_maintenance.Delete')}}</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection

