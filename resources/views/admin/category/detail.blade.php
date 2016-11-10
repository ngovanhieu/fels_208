@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.sidebar')
@endsection

@section('content')

<h3><strong>{{ $title }}: </strong>{{ $category->name }}</h3>
<img class="category-img" src="{{ Storage::url($category->photo) }}" alt="">
<form class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">{{ trans('fels.name') }}</label>
    <div class="col-sm-10">
      <p class="form-control-static">{{ $category->name }}</p>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">{{ trans('category.description') }}</label>
    <div class="col-sm-10">
      <p class="form-control-static">{{ $category->description }}</p>
    </div>
  </div>
    <div class="form-group">
      <a href="{{ action('Admin\CategoriesController@edit', ['id' => $category->id]) }}" class="btn btn-default">{{ trans('fels.edit') }}</a>
  </div>
</form>

@endsection
