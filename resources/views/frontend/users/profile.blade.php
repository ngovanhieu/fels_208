@extends('layouts.app')

@section('content')

{{ trans('fels.show-profile') }}
<hr>
<img src="{{ asset(Auth::user()->avatar) }}" style="width:200px; height:200px" alt=""><br><br>
<label>Name: </label> {{ Auth::user()->name }}<br>
<label>Email: </label> {{ Auth::user()->email }}<br><br>
<a href="{{ url('/profile/update') }}">
    <button class="btn btn-success" type="button">Update Profile</button>
</a>
<a href="{{ url('/profile/change-password') }}">
    <button class="btn btn-info" type="button">Change Password</button>
    </a>
@endsection
