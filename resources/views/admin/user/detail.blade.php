@extends('layouts.app')

@section('sidebar')
    @include('layouts.includes.sidebar')
@endsection

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3><strong>{{ $title }} : </strong>{{ $user->name }}</h3>
<img src="{{ $user->avatar ? asset(($user->avatar_url)) : asset(config('fels.default-avatar')) }}" class="avatar">
<form class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ trans('fels.name') }} :</label>
          <div class="col-sm-10">
              <p class="form-control-static">{{ $user->name }}</p>
          </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ trans('users.email') }} :</label>
          <div class="col-sm-10">
              <p class="form-control-static">{{ $user->email }}</p>
          </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">{{ trans('users.role') }} :</label>
          <div class="col-sm-10">
              <p class="form-control-static">{{ trans('users.role-user.' . $user->role) }}</p>
          </div>
    </div>
    <div class="form-group">
        @if (!($user->isSuperAdmin() || $user->isAdmin() && Auth::user()->isAdmin()))
            <a href="{{ action('Admin\UsersController@edit', ['id' => $user->id]) }}" class="btn btn-success">  
                {{ trans('fels.button.edit') }}
            </a>
        @endif
        <a href="{{ action('Admin\UsersController@index') }}" class="btn btn-default">
            {{ trans('fels.button.back-to-list') }}
        </a>
    </div>
</form>

@endsection
