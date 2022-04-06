@extends('index')

@section('content')
    <h1 class="h3 mb-3 fw-normal text-center">Edit profile</h1>
    <form class="col-3 offset-4 mb-4" method="POST" action="{{ route('user.edit') }}">
        @csrf
        @method('PUT')
        <div class="form-floating">
            <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}" placeholder="Name">
            <label for="email" class="floatingInput">Name</label>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        @csrf
        <div class="form-floating">
            <input class="form-control" id="email" name="email" type="text" value="{{ $user->email }}" placeholder="Email">
            <label for="email" class="floatingInput">E-mail</label>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating">
            <input class="form-control" id="password" name="password" type="password" value="" placeholder="Password">
            <label for="password" class="floatingInput">Password</label>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary">Save</button>
    </form>
@endsection
