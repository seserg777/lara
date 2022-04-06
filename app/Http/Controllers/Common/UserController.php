<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\Common\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = UserService::all();
        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = UserService::detail($id);

        $data = [
            'user'         => $user
        ];

        return view('user.detail')->with($data);
    }

    public function edit($id)
    {
        $user = UserService::detail($id);

        $data = [
            'user'         => $user
        ];

        return view('user.edit')->with($data);
    }

    public function update($request)
    {
        dd('update');
    }

    public function destroy($id)
    {
        dd('destroy');
    }

    public function registration()
    {
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('user.registration');
    }
}
