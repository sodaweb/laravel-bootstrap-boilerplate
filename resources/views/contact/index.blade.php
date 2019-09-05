@extends('layouts.layout')

@section('title', 'Contact')

@section('content')

    <div class="container">

        <h1 class="mt-4 mb-3">Contact
            <small>Subheading</small>
        </h1>

        <div class="row">

            <div class="col-lg-8 mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1802.5274628900686!2d-51.440450142003634!3d-25.369475595954103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ef3681ce1034cf%3A0x2fcffee61c6b7244!2sAg%C3%AAncia+Digital+Sodaweb!5e0!3m2!1spt-BR!2sbr!4v1523036276259" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="col-lg-4 mb-4">
            
                <h3>Contact Details</h3>
                <p>
                    3481 Melrose Place
                    <br>Beverly Hills, CA 90210
                    <br>
                </p>
                <p>
                    <abbr title="Telefone">T</abbr>: (12) 3456-7890
                </p>
                <p>
                    <abbr title="E-email">E</abbr>:
                    <a href="mailto:name@example.com">name@example.com
                    </a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>Send us a Message</h3>
                {!! Form::open(['route' => 'contact', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', 'Phone') !!}
                        {!! Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('message', 'Message') !!}
                        {!! Form::textarea('message', null, ['id' => 'message', 'class' => 'form-control', 'cols' => '30', 'rows' => '10']) !!}
                    </div>
                    <div class="form-group">
                        {!! Captcha::display() !!}
                    </div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
@endsection