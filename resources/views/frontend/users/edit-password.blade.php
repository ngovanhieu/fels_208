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
{!! Form::open(['action' => ['User\ProfilesController@updatePassword'], 
'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label(trans('users.old-password')) !!}
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
    <a href="{{ url('profile/'. Auth::user()->id) }}">{{ Form::button(trans('fels.button.back'), ['class' => 'btn btn-default']) }}</a>
{!! Form::close() !!}

@endsection
