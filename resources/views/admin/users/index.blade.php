@extends('admin.layouts.layout')

@section('title', 'Users')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    <div class="col s12 m10 offset-m1 l8 offset-l2">
        <div class="card-panel">
            <h1 class="card-title">
                User List
            </h1>
            <table class="highlight">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>General Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td><i class="material-icons md-18">{{{ $user->admin == true ? 'check_circle' : 'cancel' }}}</i></td>
                            <td class="actions">
                                <a href="{{ route('admin.users.show', $user->id) }}" role="button" class="btn btn-default" title="View">
                                    <i class="material-icons md-18">visibility</i>
                                </a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" role="button" class="btn" title="Edit">
                                    <i class="material-icons md-18">edit</i>
                                </a>
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['admin.users.destroy', $user->id]
                                ]) !!}
                                    <button type="submit" class="btn red" onclick="return confirm('Are you sure?')" title="Delete">
                                        <i class="material-icons md-18">delete</i>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-action">
                <a href="{{ route('admin.users.create') }}" role="button" class="btn green btn-xs">
                    <i class="material-icons md-18">add</i>
                </a>
                {!! $users->render() !!}
            </div>
        </div>
    </div>

    <div class="fixed-action-btn" style="bottom: 20px; right: 24px;">
        <a href="{{ route('admin.users.create') }}" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">add</i></a>
    </div>


@endsection