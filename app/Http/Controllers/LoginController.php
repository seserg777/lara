<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request) {
        if(Auth::check()){
            return redirect(route('homepage'));
        }
        //echo Hash::make('test');exit;
        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields)) {
            //return redirect()->intended(route('user.private'));
            return redirect(route('homepage'));
        }

        return redirect(route('login'))->withErrors([
           'email' => "Can't auth"
        ]);
    }
}
