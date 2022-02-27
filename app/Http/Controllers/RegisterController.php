<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
    public function index() {
        return view('register/index', [
            'title'    => 'Register',
            'nav_link' => 'register',
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name'             => 'required|max:255',
            'username'         => ['required', 'min:3', 'max:255', 'unique:users'],
            'email'            => 'required|email:dns|unique:users',
            'password'         => 'required|min:5|max:255|same:confirm_password',
            'confirm_password' => 'required|min:5|max:255|same:password',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if (User::create($validatedData)) {
            echo "
                <script>
                    alert('data has been saved!');
                </script>
            ";
        }
        // $request->session()->flash('success', 'New user has been created');
        return redirect('/login')->with('success', 'New user has been created');
    }
}