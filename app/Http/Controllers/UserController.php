<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:100'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request) {
        $incommingFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(auth()->attempt([
                'email'=> $incommingFields['email'],
                'password'=> $incommingFields['password'],
        ])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('/');
    }
}
