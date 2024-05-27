<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('signin', [
            'title' =>'Sign in'
        ]);
    }

    public function indexRedirect(Request $request)
    {
        // Store the intended URL in the session
        $request->session()->put('redirect', $request->input('redirect'));

        return view('signin', [
            'title' => 'Sign in',
        ]);
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'username'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // Retrieve and remove the intended URL from the session
            $redirect = $request->session()->pull('redirect', '/');

            return redirect($redirect);
        }
 
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
