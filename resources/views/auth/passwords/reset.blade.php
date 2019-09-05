@extends('admin.layouts.layout')

@section('content')
<div id="password-email" class="container">
    <div class="row">
        <br>
        
        {!! Form::open(['route' => 'password.request', 'class' => 'form-horizontal', 'role' => 'form']) !!}

            <div class="col s12 m10 offset-m1 l8 offset-l2 center-align">

                <h3>New Password</h3>

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                    {!! Form::email('email', null, ['class' => 'form-control'.($errors->has('email') ? ' validate invalid' : '')]) !!}
                    {!! Form::label('email', 'E-mail', ['class' => '', 'data-error' => $errors->has('email') ? $errors->first('email') : '']) !!}
                </div>

                <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                    {!! Form::password('password', ['class' => 'form-control'.($errors->has('password') ? ' validate invalid' : '')]) !!}
                    {!! Form::label('password', 'Password', ['class' => '', 'data-error' => $errors->has('password') ? $errors->first('password') : '']) !!}
                </div>

                <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                    {!! Form::password('password_confirmation', ['class' => 'form-control'.($errors->has('password_confirmation') ? ' validate invalid' : '')]) !!}
                    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => '', 'data-error' => $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '']) !!}
                </div>

                

                <div class="form-group">
                    <div class="col s12 m8 offset-m2 l6 offset-l3">
                        {!! Form::submit('Save', ['class' => 'btn']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
