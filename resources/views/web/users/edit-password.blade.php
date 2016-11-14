@extends('layouts.app')

@section('content')

{{ trans('users.change-password') }}
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
{!! Form::open(['action' => ['Web\ProfilesController@updatePassword'], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('old_password', trans('users.old-password')) !!}
        {!! Form::password('old_password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label(trans('users.new-password')) !!}
        {!! Form::password('new_password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label(trans('users.confirm-password')) !!}
        {!! Form::password('new_password_confirmation', ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit(trans('fels.button.update-submit'), ['class' => 'btn btn-success']) !!}
    {!! Form::reset(trans('fels.button.reset'), ['class' => 'btn btn-info']) !!}
    <a href="{{ action('Web\ProfilesController@show', ['id' => Auth::user()->id]) }}" class="btn btn-default">
    <strong>{{ trans('fels.button.back-to-profile') }}</strong></a>
{!! Form::close() !!}

@endsection
