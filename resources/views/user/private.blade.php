@extends('index')

@section('content')
    Hi, {{ $user->name }}!

    {{-- dd($userRoles) --}}
@endsection
