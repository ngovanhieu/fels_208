@extends('layouts.app')

@section('content')

{{ $title }}
<hr>
@if($user)
    <img src="{{ $user->avatar ? asset(($user->avatar_url)) : asset(config('fels.default-avatar')) }}" class="avatar">
    <label>{{ trans('fels.name') }}: </label> {{ $user->name }}<br>
    <label>{{ trans('fels.email') }}: </label> {{ $user->email }}<br><br>
    @if($user->isCurrent())
        <a href="{{ action('Web\ProfilesController@edit', ['id' => $user->id]) }}">
            <button class="btn btn-success" type="button">{{ trans('users.update-profile') }}</button>
        </a>
        <a href="{{ action('Web\ProfilesController@editPassword') }}">
            <button class="btn btn-info" type="button">{{ trans('users.change-password') }}</button>
        </a>
    @elseif($check_follow)
        <a href="{{ action('Web\FollowsController@unfollow', ['id' => $user->id]) }}" class="btn btn-success"
              onclick="event.preventDefault(); 
              document.getElementById('unfollow-form').submit();">
              <strong>{{ trans('users.user-follow.unfollow') }}</strong>
        </a>
        <form id="unfollow-form" action="{{ action('Web\FollowsController@unfollow', ['id' => $user->id]) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @else
        <a href="{{ action('Web\FollowsController@follow', ['id' => $user->id]) }}" class="btn btn-success"
              onclick="event.preventDefault(); 
              document.getElementById('follow-form').submit();">
              <strong>{{ trans('users.user-follow.follow') }}</strong>
        </a>
        <form id="follow-form" action="{{ action('Web\FollowsController@follow', ['id' => $user->id]) }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endif
@else
    <div class="alert alert-danger">{{ trans('users.not-found') }}</div>
    <br>
    <a href="{{ action('Web\ProfilesController@show', ['id' => Auth::user()->id]) }}" class="btn btn-default">
    <strong>{{ trans('fels.button.back-to-profile') }}</strong></a>
@endif

@endsection
