@extends('index')

@section('content')
    <h1 class="h3 mb-3 fw-normal text-center">Users list</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <a href="{{ url('/users/detail', ['id' => $user->id]) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
