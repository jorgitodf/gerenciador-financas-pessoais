<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::check() === true) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (empty($request->email) && empty($request->password)) {
            $error['error_login'] = "Informe o E-mail e a Senha!";
        } else if (!empty($request->email) && empty($request->password)) {
            $error['error_login'] = "Informe a Senha!";
        } else if (empty($request->email) && !empty($request->password)) {
            $error['error_login'] = "Informe o E-mail!";
        } else if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $error['error_login'] = "Informe um E-mail válido!";
        } else if (!Auth::attempt($credentials)) {
            $error['error_login'] = "Usuário e Senha Não Conferem!";
        } else {
            $this->authenticated($request->getClientIp());
            return response()->json(['redirect' => route('home')], 202);
        }
        return response()->json(['error' => $error], 500);

    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update(['last_login_at' => date('Y-m-d H:i:s'), 'last_login_ip' => $ip]);
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }
}
