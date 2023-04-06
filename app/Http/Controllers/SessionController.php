<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        // Validate input
        $attribtues = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt login with given credentials
        if (!auth()->attempt($attribtues)) {
            
            // Auth failed
            throw ValidationException::withMessages(['password' => 'Your provided credentials could not be verified']);
        }

        // guard against session fixation
        session()->regenerate();

        return redirect('/')->with('success', 'You are now logged in');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You have been logged out, shalom!');
    }
}
