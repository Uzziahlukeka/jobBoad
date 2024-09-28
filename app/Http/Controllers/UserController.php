<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //for registration and crud the user
    public function create(){
        return view('auth.register');
    }
    public function store(){
        //validation
        $validated =request()->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        //create the user
        $user=User::create($validated);

        //login
        Auth::login($user);
        //
        return redirect('/jobs');

    }
}
