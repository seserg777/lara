@extends('index')

@section('content')
    <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
    <form class="col-3 offset-4" method="POST" action="{{ route('user.registration') }}">
        @csrf
        <div class="form-floating">
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="" placeholder="Name">
            <label for="email" class="floatingInput">Name</label>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @csrf
        <div class="form-floating">
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text" value="" placeholder="Email">
            <label for="email" class="floatingInput">E-mail</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating">
            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" value="" placeholder="Password">
            <label for="password" class="floatingInput">Password</label>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary">Register</button>
    </form>
@endsection
