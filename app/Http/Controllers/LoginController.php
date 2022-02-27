<?php

namespace App\Http\Controllers;

class LoginController extends Controller {
    public function index() {
        return view('login/index', [
            'title'    => 'login',
            'nav_link' => 'login',
        ]);
    }
}