<ul class="nav nav-pills nav-stacked panel panel-default sidebar">
    <li role="presentation">
        <a href="#"><strong>{{ trans('category.category') }}</strong></a>
        <ul class="nav nav-pills nav-stacked fa-ul">
            <li class="{!! set_active(['admin/category/create']) !!}">
                <a href="{{ url('/admin/category/create') }}">
                    <i class="fa-li fa fa-caret-right"></i>{{ trans('fels.create') }}
                </a>
            </li>
            <li class="{!! set_active(['admin/category']) !!}">
                <a href="{{ url('/admin/category/') }}">
                    <i class="fa-li fa fa-caret-right"></i>{{ trans('fels.list') }}
                </a>
            </li>
        </ul>
    </li>
    <li role="presentation">
        <a href="#"><strong>{{ trans('fels.word') }}</strong></a>
        <ul class="nav nav-pills nav-stacked">
            <li class="{!! set_active(['admin/word/create']) !!}">
                <a href="{{ action('Admin\WordsController@create') }}">
                    <i class="fa-li fa fa-caret-right"></i>{{ trans('fels.create') }}
                </a>
            </li>
            <li class="{!! set_active(['admin/word']) !!}">
                <a href="{{ action('Admin\WordsController@index') }}">
                    <i class="fa-li fa fa-caret-right"></i>{{ trans('fels.list') }}
                </a>
            </li>
        </ul>
    </li>
    <li role="presentation">
        <a href="#"><strong>{{ trans('fels.user') }}</strong></a>
        <ul class="nav nav-pills nav-stacked">
            <li class="{!! set_active(['admin/user/create']) !!}">
                <a href="{{ action('Admin\UsersController@create') }}">
                    <i class="fa-li fa fa-caret-right"></i>{{ trans('fels.create') }}
                </a>
            </li>
            <li class="{!! set_active(['admin/user']) !!}">
                <a href="{{ action('Admin\UsersController@index') }}">
                    <i class="fa-li fa fa-caret-right"></i>{{ trans('fels.list') }}
                </a>
            </li>
        </ul>
    </li>
</ul>
