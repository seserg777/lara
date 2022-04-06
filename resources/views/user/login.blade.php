@extends('index')

@section('content')
    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
    <form class="col-3 offset-4" method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="form-floating">
            <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
            <label for="email" class="floatingInput">E-mail</label>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating">
            <input class="form-control" id="password" name="password" type="text" value="" placeholder="Password">
            <label for="password" class="floatingInput">Password</label>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary">Login</button>
    </form>
@endsection
