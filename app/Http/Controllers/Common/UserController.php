<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Services\Common\UserService;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        //dd('constructor', request());
        $this->middleware('auth')->only([
            'edit',
            'update'
        ]);
    }

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
        //dd('edit', request()->method());
        //dd('edit');
        $user = UserService::detail($id);
        $roles = Role::all(['id', 'name']);
        $userRoles = $user->roles()->get();

        dump($roles, $user->roles);

        $data = [
            'user'=>       $user,
            'roles' =>     $roles,
            'userRoles' => $userRoles
        ];

        return view('user.edit')->with($data);
    }

    public function update(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ] );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        UserService::update($request, $user);

        return redirect(route('user.index'))->with('success','User data saved');
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
