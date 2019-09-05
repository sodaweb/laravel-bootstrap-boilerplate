@extends('admin.layouts.layout')

@section('title', 'Login')

@section('content')
        <div class="row">
            <div class="col s12 m10 offset-m1 l8 offset-l2">
                <div class="panel">
                    <div class="panel-heading center-align">
                        <h4>Login - Admin Panel</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                                {!! Form::email('email', null, ['class' => 'form-control', 'type' => 'email']) !!}
                                {!! Form::label('email', 'E-mail', ['class' => '']) !!}
                            </div>
                            <div class="input-field col s12 m10 offset-m1 l8 offset-l2">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                {!! Form::label('password', 'Senha', ['class' => '']) !!}
                            </div>
                            <div class="input-field col s12 m10 offset-m1 l8 offset-l2 center-align">
                                {!! Captcha::display() !!}
                            </div>

                            <div class="col s12 center-align">
                                <br>
                                {!! Form::submit('Login', ['class' => 'btn']) !!}
                                <a href="{{ route('password.new') }}" class="btn white grey-text text-darken-4">Forgot Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
