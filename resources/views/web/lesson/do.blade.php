@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.web-sidebar')
@endsection

@section('content')

<h3>{{ $title }}</h3>
<hr>
@if (session()->has('status'))
    <div class="alert alert-success">
        <p>{{ session('status') }}</p>
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
<div class="row">
    <div class="col-md-12">
    {!! Form::open(['url' => route('lesson.store'), 'method' => 'post']) !!}

        {!! Form::hidden('category_id', $category->id); !!}

        @foreach ($questions as $key => $question)

            <h3>{{ $key + 1 }} | {{ $question['word']->content }}</h3>
            {!! Form::hidden('results[' . $key . '][word]', $question['word']->id); !!}

            @foreach ($question['answers'] as $answer)
            <div class="radio">
              <label>
                {!! Form::radio('results[' . $key . '][answer]', $answer->id,  ['class' => 'form-control']); !!}
                {{ $answer->content }}
              </label>
            </div>

            @endforeach

        @endforeach
        {!! Form::submit(trans('fels.button.done')); !!}
    {!! Form::close() !!}
    </div>
</div>
@endsection
