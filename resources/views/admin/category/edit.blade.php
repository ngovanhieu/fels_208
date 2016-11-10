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

<h3><strong>{{ $title }}: </strong>{{ trans('category.edit') }}</h3>
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
<div class="edit-photo-container">
    <img class="category-img" src="{{ Storage::url($category->photo) }}" alt="">
    <p>{{ trans('category.info.upload') }}</p>
</div>

{!! Form::model($category, ['route' => ['category.update', $category->id],  'method' => 'put', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', trans('category.name')); !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', trans('category.description')); !!}
        {!! Form::text('description', old('description'), ['class' => 'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo', trans('category.photo')); !!}
        {!! Form::file('photo', ['id' => 'upload-photo']); !!}
    </div>
    <div class="form-group">
        {!! Form::submit(trans('fels.button.edit'), ['class' => 'btn btn-default']); !!}
    </div>
{!! Form::close() !!}

<script>
    var previewStatus = "{!! trans('fels.info.change-photo') !!}";
</script>
@endsection
