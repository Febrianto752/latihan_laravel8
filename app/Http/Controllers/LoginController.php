<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        return view('login/index', [
            'title'    => 'login',
            'nav_link' => 'login',
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email'    => 'required|email:dns',
            'password' => 'required|min:3|max:255',
        ]);

        // cek credentials apakah email dan password sesuai dengan yang ada di database
        if (Auth::attempt($credentials)) {
            // you should regenerate the user's session to prevent session fixation
            $request->session()->regenerate();

            // sebelum redirect harus melewati middleware terlebih dahulu(intended('url'))
            return redirect()->intended('dashboard');
        }

        // jika gagal maka balik lagi ke halaman login sekalian kirim error, dan akan ditangkap oleh variabel $errors di view
        // return back()->withErrors([
        //     'credentials' => 'login failed!',
        // ]);

        return back()->with('loginError', 'Login Failed!')->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}