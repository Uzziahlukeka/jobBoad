<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //for login and log out
    public function create(){
        return view('auth.login');
    }
    public function store(){

        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //attempt to login the user
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'The provided right credentials ',
                'password' => 'The provided right credentials '
            ]);
        }//return a bool
        //regenerate the session
        request()->session()->regenerate();
        //redirect
        return redirect('/jobs');
    }
    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
