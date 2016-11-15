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

@if($users)
<table class="table table-striped">
    <tr>
        <td>{{ trans('fels.id') }}</td>
        <td>{{ trans('users.avatar') }}</td>
        <td>{{ trans('users.name') }}</td>
        <td>{{ trans('users.email') }}</td>
        <td>{{ trans('users.role') }}</td>
        <td>{{ trans('users.action') }}</td>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>
            <img src="{{ isset($user->avatar) ?  asset(($user->avatar_url)) : asset(config('fels.default-avatar')) }}" class="avatar">
        </td>
        <td><a href="{{ action('Admin\UsersController@show', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
        <td>{{ trans('users.role-user.' .$user->role) }} </td>
        <td>
        @if ($user->isMember() || ($user->isAdmin() && Auth::user()->isSuperAdmin()))
            <a href="{{ action('Admin\UsersController@edit', ['id' => $user->id]) }}" class="btn btn-warning">
                {{ trans('fels.button.edit') }}
            </a>

            {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                <button onclick=" return confirm('{{ trans('users.delete.confirm') }}')" type="submit" class="btn btn-danger">
                    {{ trans('fels.button.delete') }}
                </button>
            {!! Form::close() !!}
        @elseif ($user->role == 3 && Auth::user()->role == 3)
            <a href="{{ action('Admin\UsersController@edit', ['id' => $user->id]) }}" class="btn btn-warning">
                {{ trans('fels.button.edit') }}
            </a>
        @endif
        </td>
    </tr>
    @endforeach
</table>
{{ $users->links() }}
@else
    <div class="alert">
        <p>{{ trans('fels.status.nothing-to-show') }}</p>
    </div>
@endif

@endsection
