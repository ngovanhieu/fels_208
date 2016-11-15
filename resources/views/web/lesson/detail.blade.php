@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.web-sidebar')
@endsection

@section('content')

{{ $title }}
<hr>
<div class="row">
    <div class="col-md-12">
    <p>{{ $examiner->name }}</p>
        <table class="table">
            <tr>
                <td><strong>{{ trans('web/lesson.word') }}</strong></td>
                <td><strong>{{ trans('web/lesson.answer') }}</strong></td>
                <td><strong>{{ trans('web/lesson.true-false') }}</strong></td>
            </tr>
            @foreach ($results as $result)
            <tr>
                <td>{{ $result->word->content }}</td>
                <td>{{ $result->answer->content }}</td>
                <td>{{ trans('web/lesson.' . $result->answer->is_correct) }}</td>
            </tr>
            @endforeach
            <p>
                {{ trans('web/lesson.rating') }} <strong>{{ count($score) }} / {{ count($results) }}</strong>
            </p>
            <p>
                {{ trans('category.category') }} <strong>{{ $category->name }}</strong>
            </p>
        </table>
    </div>
</div>
@endsection
