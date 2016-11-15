@extends('layouts.app')

@section('content')

{{ trans('users.update-profile') }}
<hr>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(['action' => ['Web\ProfilesController@update', $user->id], 
'method' => 'put', 'files' => true]) !!}
    @if(!$user->avatar)
        <img src="{{ asset(config('fels.default-avatar')) }}" class="avatar" alt=""><br><br>
    @else
        <img src="{{ asset($user->avatar_url) }}" class="avatar"><br><br>
    @endif
     <div class="form-group">
        {!! Form::label('image') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', trans('fels.name')) !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', trans('fels.email')) !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit(trans('fels.button.update-submit'), ['class' => 'btn btn-success']) !!}
    {!! Form::reset(trans('fels.button.reset'), ['class' => 'btn btn-info']) !!}
    <a href="{{ action('Web\ProfilesController@show', ['id' => Auth::user()->id]) }}" class="btn btn-default">
    <strong>{{ trans('fels.button.back-to-profile') }}</strong></a>
{!! Form::close() !!}

@endsection
