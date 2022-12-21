<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('mahasiswa');
        } else {
            return view('auth.login');
        }
    }

    public function actionlogin(Request $request)
    {

        $this->validate($request, [
            'email'       => 'required|email',
            'password'      => 'required',
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('mahasiswa');
        } else {
            return redirect()->route('login')->with(['error' => 'Email atau Password Salah']);
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
