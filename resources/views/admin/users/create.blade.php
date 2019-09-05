@extends('admin.layouts.layout')

@section('title', 'New User')

@section('content')
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="card-panel">
                <h1>New User</h1>
                {!! Form::open(['route' => 'admin.users.store', 'class' => 'form-horizontal']) !!}
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::text('email', null, ['class' => '', '']) !!}
                            {!! Form::label('email', 'E-mail', ['class' => '']) !!}
                        </div>
                        <div class="input-field col s12">
                            {!! Form::text('name', null, ['class' => '']) !!}
                            {!! Form::label('name', 'Name', ['class' => '']) !!}
                        </div>
                        <div class="input-field col s12">
                            {!! Form::password('password', ['class' => '']) !!}
                            {!! Form::label('password', 'Password', ['class' => '']) !!}
                        </div>
                        <div class="input-field col s12">
                            {!! Form::password('password_confirmation', ['class' => '']) !!}
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => '']) !!}
                        </div>
                        <div class="col s12">
                            <label>
                                {!! Form::checkbox('admin', null, false, ['id' => 'admin', 'class' => 'filled-in']) !!}
                                <span>General Admin</span>
                            </label>
                        </div>
                    </div>
                    <div class="row center-align">
                        {!! Form::submit('Save changes', ['class' => 'btn green']) !!}
                        <a href="{{ route('admin.users.index') }}" class="btn">Return</a>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection