@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.web-sidebar')
@endsection

@section('content')

{{ $title }}
<hr>
<div class="row">
    <div class="col-md-12">
    <p>{{ $user->name }}</p>
        <table class="table">
            <tr>
                <td>{{ trans('web/lesson.id') }}</td>
                <td>{{ trans('web/lesson.category') }}</td>
            </tr>
            @foreach ($lessons as $lesson)
            <tr>
                <td>
                    <a href="{{ action('Web\LessonsController@show', ['id' => $lesson->id]) }}">
                        {{ $lesson->id }}
                    </a>
                </td>
                <td>{{ $lesson->category->name }}</td>
            </tr>
            @endforeach
        </table>
        {{ $lessons->links() }}
    </div>
</div>
@endsection
