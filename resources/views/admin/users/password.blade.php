@extends('admin.layouts.layout')

@section('title', 'Change Password')

@section('content')
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="card-panel">
                <h1>Change Password</h1>
                {!! Form::model($user, ['method' => 'PATCH', 'class' => 'form-horizontal', 'route' => ['account.password']]) !!}
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="input-field col s12">
                            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}
                        </div>
                        <div class="input-field col s12">
                            {!! Form::label('current_password', 'Current Password', ['class' => 'control-label']) !!}
                            {!! Form::password('current_password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="input-field col s12 m6">
                            {!! Form::label('password', 'New Password', ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="input-field col s12 m6">
                            {!! Form::label('password_confirmation', 'Confirm New Password', ['class' => 'control-label']) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row center-align">
                        {!! Form::submit('Save changes', ['class' => 'btn green']) !!}
                        <a href="{{ route('admin.home.index') }}" class="btn">Return</a>
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection