@extends('admin.layouts.layout')

@section('content')
<div id="password-email" class="container">
    <div class="row">
        <br>
        {!! Form::open(['route' => 'password.email', 'class' => 'form-horizontal', 'role' => 'form']) !!}

            <div class="col s12 m10 offset-m1 l8 offset-l2 center-align">
            
                <h3>Recover Password</h3>
                <p>An message with a recovery password link will be sent to following e-mail address.</p>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col s12 m8 offset-m2 l6 offset-l3">   
                        {!! Form::label('email', 'E-mail', ['class' => '']) !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div> 
                </div>
                <br>
                <div class="form-group">
                    <div class="col l6 offset-l3">
                        {!! Form::submit('Submit', ['class' => 'btn']) !!}
                    </div>
                </div>

            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
