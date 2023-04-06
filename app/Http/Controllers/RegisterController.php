<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // Validate will redirect you back to previous page on failed attempt
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'min:2'],
            'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'max:255', 'min:8'],
        ]);

        // Hash given password => hashing in User Model Mutator method
        // $attributes['password'] = bcrypt($attributes['password']);

        // Validation passes
        $user = User::create($attributes);

        // Login the user
        auth()->login($user);

        // Redirect with flash success message (put a value into session to reach message from)
        return redirect('/')->with('success', 'Your account has been created');
    }
}
