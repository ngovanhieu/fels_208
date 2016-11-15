@extends('layouts.app')

@section('content')

{{ $title }}
<hr>
@if($user)
@if(!$user->avatar)
    <img src="{{ asset(config('fels.default-avatar')) }}" class="avatar" alt=""><br><br>
@else
    <img src="{{ asset($user->avatar_url) }}" class="avatar"><br><br>
@endif
    <label>{{ trans('fels.name') }}: </label> {{ $user->name }}<br>
    <label>{{ trans('fels.email') }}: </label> {{ $user->email }}<br><br>
    @if($user->isCurrent())
        <a href="{{ action('Web\ProfilesController@edit', ['id' => $user->id]) }}">
            <button class="btn btn-success" type="button">{{ trans('users.update-profile') }}</button>
        </a>
        <a href="{{ action('Web\ProfilesController@editPassword') }}">
            <button class="btn btn-info" type="button">{{ trans('users.change-password') }}</button>
        </a>
    @endif
@else
    <div class="alert alert-danger">{{ trans('users.not-found') }}</div>
    <br>
    <a href="{{ action('Web\ProfilesController@show', ['id' => Auth::user()->id]) }}" class="btn btn-default">
    <strong>{{ trans('fels.button.back-to-profile') }}</strong></a>
@endif

@endsection
