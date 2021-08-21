<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.signup');
    }

    public function store(SignUpRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect(route('homepage'));
    }

    public function loginForm()
    {
        return view('user.login');
    }
    public function login(LoginRequest $request){
                if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]));
        return redirect()->route('homepage');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
