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
{!! Form::open(['url' => route('category.store'), 'method' => 'post', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', trans('fels.name')); !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', trans('category.description')); !!}
        {!! Form::text('description', old('description'), ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo', trans('category.photo')); !!}
        {!! Form::file('photo'); !!}
    </div>
    <div class="form-group">
        {!! Form::submit(trans('fels.create'), ['class' => 'btn btn-default']); !!}
    </div>
{!! Form::close() !!}

@endsection
