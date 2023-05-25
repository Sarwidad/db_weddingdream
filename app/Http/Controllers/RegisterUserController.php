<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    
    // public function index()
    // {
    //     $user = User::all();
    //     return view('laravel-examples/user-management',['user'=>$user]);
    // }

    public function create()
    {
        return view('session.register-user');
    }

    public function store(Request $request)
    {

        $attributes = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role'=>$request->role
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        return redirect('/user-management')->with('success','Create Account successfully');
    }

}

