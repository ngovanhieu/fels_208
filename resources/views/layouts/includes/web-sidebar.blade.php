@if(!$user->avatar)
    <td><img src="{{ asset(config('fels.default-avatar')) }}" class="avatar" alt=""></td>
@else
    <td><img src="{{ asset($user->avatar_url) }}" class="avatar"></td>
@endif

<p>{{ $user->name }}</p>
<ul class="nav nav-pills nav-stacked panel panel-default sidebar">
    <li role="presentation">
        <a href="{{ action('Web\LessonsController@index') }}">
            <strong>{{ trans('web/lesson.your-lesson') }}</strong>
        </a>
    </li>
    <li role="presentation">
        <a href="{{ action('Web\CategoriesController@index') }}">
            <strong>{{ trans('web/lesson.do-lesson') }}</strong>
        </a>
    </li>
</ul>
