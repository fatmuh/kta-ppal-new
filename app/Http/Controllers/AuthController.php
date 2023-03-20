<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('login.main', [
            'layout' => 'login'
        ]);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $login = User::where('email', $request->email)
            ->where(function ($q) use ($request) {
                return $q->where('active', 1);
            })->first();

        // return $login;

        if ($login) {

            if (Hash::check($request->password, $login->password)) {

                Auth::login($login);

                return redirect()->intended('/')->with('success-message', 'Berhasil Login!');
            } else {
                return redirect()->route('login.index')->with('error-message', 'Email atau Password anda salah!')->withInput();
            }
        }

        return redirect()->route('login.index')->with('error-message', 'Data tidak terdaftar pada sistem!')->withInput();
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.check')->with('success-message', 'Anda berhasil keluar dari sistem!');
    }
}
