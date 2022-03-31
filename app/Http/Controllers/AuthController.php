<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function login(Request $request) {
        $user = User::where('login', $request->login)->first();

        if($user) {
            if($user->password == $request->password) {
                Auth::login($user);
                return redirect('/admin');
            } else {
                return redirect('/login')->withErrors([
                    'password' => 'Неправильный пароль!'
                ]);
            }
        } else {
            return redirect('/login')->withErrors([
                'login' => 'Пользователь не найден!'
            ]);
        }
    }
}
