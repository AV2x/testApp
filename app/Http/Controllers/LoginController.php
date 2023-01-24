<?php

namespace App\Http\Controllers;

use App\Events\UserRegistrateEvent;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(AuthRequest $request)
    {
        $creditintails = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($creditintails)){
            $request->session()->regenerate();
            return redirect()->route('admin');
        }
        return back()->withErrors([
            'email' => 'Email или Пароль не подходит',
        ])->onlyInput('email');
    }

    public function registration(Request $request)
    {
       $user = User::create();
       event(new UserRegistrateEvent($user));
    }
}
