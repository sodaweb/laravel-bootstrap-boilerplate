@extends('admin.layouts.layout')

@section('title', 'Ver User')

@section('content')
    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2">
            <div class="card-panel">
                <div class="row">
                    <h1>Ver User</h1>
                    <div class="col s12">
                        <p>Name: {{ $user->name }}</h3>
                        <p>E-mail: {{ $user->email }}</p>
                        <p>Id: {{ $user->id }}</p>
                        <p>general Admin: {{{ $user->admin == true ? 'sim' : 'não' }}}</p>
                        <hr>
                    </div>
                    <div class="col s12 actions center-align">
                        <a href="{{ route('admin.users.index') }}" class="btn">Return</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn">Edit</a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['admin.users.destroy', $user->id]
                        ]) !!}
                            {!! Form::submit('Remove', ['class' => 'btn red']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@stop