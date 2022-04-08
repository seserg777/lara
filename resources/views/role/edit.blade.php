@extends('index')

@section('content')
    <h1 class="h3 mb-3 fw-normal text-center">Edit profile</h1>
    <form action="{{ url('users/roles') }}" class="col-3 offset-4 mb-4" method="POST">
        @csrf
        @method('POST')
        <div class="form-floating">
            <input class="form-control" id="name" name="name" type="text" value="" placeholder="Name">
            <label for="email" class="floatingInput">Name</label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary">Save</button>
    </form>
@endsection
