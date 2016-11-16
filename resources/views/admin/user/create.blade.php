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

<h3><strong>{{ $title }}: </strong>{{ trans('fels.create') }}</h3>
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
{!! Form::open(['url' => route('user.store'), 'method' => 'post', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', trans('users.name')) !!}
        {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', trans('users.email')) !!}
        {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role', trans('users.role')) !!}
        {!! Form::select('role', getRoleOptions(), '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit(trans('fels.button.create'), ['class' => 'btn btn-success']) !!}
        {!! Form::reset(trans('fels.button.reset'), ['class' => 'btn btn-info']) !!}
    </div>
{!! Form::close() !!}

@endsection
