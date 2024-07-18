@extends('navbar')
@section('title', 'Update Role')
@section('page', '/update-role' . '/' . $user->id)
@section('page_id', '/update-role/id' . '/' . $user->id)
@section('content')
    <div class="update-role-form">
        <h2>{{__('pageLanguage.update role.Update Role')}}</h2>
        <h2 style="text-decoration: underline; font-size: 25px;">{{$user->first_name}} {{$user->last_name}}</h2>
        <form action ="/update-role/{{$user->id}}" method="POST" class="row g-3">
            {{ csrf_field() }}
            <div class="col-md-12">
                <label for="role" class="form-label">{{__('pageLanguage.update role.Role')}}</label>
                <select id="role" class="form-select" name="role">
                    <option selected>{{__('pageLanguage.update role.Choose Role')}}</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary"  class="form-control">{{__('pageLanguage.update role.Save')}}</button>
            </div>
        </form>
        @if ($errors->any())
            <h2 style="color:red; opacity: 70%; font-size:20px;">{{$errors->first()}}</h2>
        @endif
    </div>
    
@endsection

