@extends('index')

@section('content')
    <h1 class="h3 mb-3 fw-normal text-center">Users list</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <a href="{{ route('user.show', ['user' => $user]) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                    @can('view-user-group', \App\Models\User::class)
                        <td>
                            @foreach($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
