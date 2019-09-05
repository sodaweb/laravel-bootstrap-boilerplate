@extends('admin.layouts.layout')

@section('title', 'Edit User')

@section('content')
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="card-panel">
                <h1>Edit User</h1>
                {!! Form::model($user, ['method' => 'PATCH', 'class' => 'form-horizontal', 'route' => ['admin.users.update', $user->id]]) !!}
                    @include('admin.users.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection