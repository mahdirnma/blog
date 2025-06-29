<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(LoginUserRequest $request){
        $myData = $request->only('email','password');
        if(Auth::attempt($myData)){
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request)
    {
        $user=User::create($request->all());
        if($user){
            Auth::login($user);
            return redirect()->route('home');
        }
        return redirect()->route('register');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
