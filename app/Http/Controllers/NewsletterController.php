<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    // Automatic resolution
    public function store(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email'],
        ]);
        
        try {
            $newsletter->subscribe(request('email'));
        } catch(\Exception $e) {
            request()->session()->flash('fail', 'Newsletter subscription failed');

            throw ValidationException::withMessages([
                'email' => request('email') . ' could not be added to our newsletter list'
            ]);
        }
        
        return redirect('/')->with('success', 'You are now signed up for our newsletter');
    }
}
