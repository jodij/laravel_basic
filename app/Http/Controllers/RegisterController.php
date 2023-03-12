<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){

        /* validate input */
        $validated = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:5|max:255',
        ]);

        /* hash password */
        $validated['ref_id'] = Str::uuid();
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('/login')->with('success','Registration successfully! Please login');
    }
}
