@extends('layouts.app')

@section('content')

{{ trans('users.update-profile') }}
<hr>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
{!! Form::open(['action' => ['User\ProfilesController@update', $user->id], 
'method' => 'put', 'files' => true]) !!}
    <img src="{{ asset($user->avatar) }}" class="avatar" alt="">
     <div class="form-group">
        {!! Form::file('avatar', ['class' => 'form-control']) !!}
        <div class="error">{{ $errors->first('avatar') }}</div>
    </div>
    <div class="form-group">
        {!! Form::label('name', trans('fels.name')) !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
        <div class="error">{{ $errors->first('name') }}</div>
    </div>
    <div class="form-group">
        {!! Form::label('email', trans('fels.email')) !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
        <div class="error">{{ $errors->first('email') }}</div>
    </div>
    {!! Form::submit( trans('fels.button.update-submit'), ['class' => 'btn btn-success']) !!}
    {!! Form::reset( trans('fels.button.reset'), ['class' => 'btn btn-info']) !!}
    <a href="{{ url('profile/'. $user->id) }}">{{ Form::button(trans('fels.button.back'), ['class' => 'btn btn-default']) }}</a>
{!! Form::close() !!}

@endsection
