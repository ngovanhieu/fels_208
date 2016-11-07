@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.sidebar')
@endsection

@section('content')

@if (session()->has('status'))
    <div class="alert">
        <p>{{ session('status') }}</p>
    </div>
@endif

<h3><strong>{{ $title }}: </strong>{{ trans('fels.list') }}</h3>
<hr>

@if($categories)
<table class="table table-striped">
    <tr>
        <td>{{ trans('fels.id') }}</td>
        <td>{{ trans('fels.name') }}</td>
        <td>{{ trans('fels.description') }}</td>
        <td>{{ trans('fels.photo') }}</td>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td><img src="{{ Storage::url($category->photo) }}" alt=""></td>
    </tr>
    @endforeach
</table>
{{ $categories->links() }}
@else
    <div class="alert">
        <p>{{ trans('fels.nothing-to-show') }}</p>
    </div>
@endif

@endsection
