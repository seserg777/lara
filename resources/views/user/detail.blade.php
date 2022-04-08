@extends('index')

@section('content')
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <button class="btn btn-secondary">
                    <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
                </button>
                <span class="name mt-3">{{ $user->name }}</span>
                <span class="idd">{{ $user->email }}</span>
                <div class=" d-flex mt-2">
                    <a href="{{ route('user.edit', ['id' => 1]) }}" class="btn1 btn-dark">Edit Profile</a>
                </div>
                <div class=" px-2 rounded mt-4 date ">
                    <span class="join">
                        {{ $user->created_at->format('d-m-Y') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
