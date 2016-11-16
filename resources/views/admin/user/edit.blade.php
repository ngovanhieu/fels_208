@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.sidebar')
@endsection

@section('content')

@if (session()->has('status'))
    <div class="alert alert-success">
        <p>{{ session('status') }}</p>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

<h3><strong>{{ $title }}: </strong>{{ trans('users.update.edit') }}</h3>
<hr>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <img src="{{ $user->avatar ? asset(($user->avatar_url)) : asset(config('fels.default-avatar')) }}" class="avatar">
</div>

{!! Form::open(['action' => ['Admin\UsersController@update', $user->id], 'method' => 'put', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('avatar', trans('users.avatar')) !!}
        {!! Form::file('avatar', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', trans('users.name')) !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', trans('users.email')) !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
    </div>
    @if (Auth::user()->isSuperAdmin())
    <div class="form-group">
        {!! Form::label('role', trans('users.role')) !!}
        {!! Form::select('role', getRoleOptions(), $user->role, ['class' => 'form-control']) !!}
    </div>
    @endif
    <div class="form-group">
        {!! Form::submit(trans('fels.button.edit'), ['class' => 'btn btn-success']) !!}
        {!! Form::reset(trans('fels.button.reset'), ['class' => 'btn btn-info']) !!}
        <a href="{{ action('Admin\UsersController@index') }}" class="btn btn-default">
            {{ trans('fels.button.back-to-list') }}
        </a>
    </div>
{!! Form::close() !!}

@endsection
