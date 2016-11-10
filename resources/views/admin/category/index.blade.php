@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.sidebar')
@endsection

@section('content')

@if (session()->has('status'))
    <div class="alert alert-info">
        <p>{{ session('status') }}</p>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

<h3><strong>{{ $title }}: </strong>{{ trans('fels.list') }}</h3>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<hr>

@if($categories)
<table class="table table-striped">
    <tr>
        <td>{{ trans('fels.id') }}</td>
        <td>{{ trans('category.name') }}</td>
        <td>{{ trans('category.description') }}</td>
        <td>{{ trans('category.photo') }}</td>
        <td>{{ trans('category.action') }}</td>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td><a href="{{ action('Admin\CategoriesController@show', ['id' => $category->id]) }}">{{ $category->name }}</a></td>
        <td>{{ $category->description }}</td>
        <td><img src="{{ Storage::url($category->photo) }}" alt=""></td>
        <td>
            <a href="{{ action('Admin\CategoriesController@edit', ['id' => $category->id]) }}" class="btn btn-default">{{ trans('fels.button.edit') }}</a>
            {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete']) !!}
                <button onclick="return confirm('{{ trans('category.delete.confirm') }}')" type="submit" class="btn btn-default">{{ trans('fels.button.delete') }}</button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>
{{ $categories->links() }}
@else
    <div class="alert">
        <p>{{ trans('fels.status.nothing-to-show') }}</p>
    </div>
@endif

@endsection
