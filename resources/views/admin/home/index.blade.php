@extends('admin.layouts.layout')

@section('title', 'Home')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <div class="row">
        @if(\Auth::user()->admin)
            <div class="col s6 m4 l3">
                <a href="{{ route('admin.users.index') }}" class="card">
                    <div class="card-content">
                        <span class="card-title">
                            <i class="material-icons medium">account_circle</i>
                        </span>
                        Users
                    </div>
                </a>
            </div>
        @endif
    </div>
@endsection
