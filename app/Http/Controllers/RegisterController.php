<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request) 
    {
        $validateData = $request->validate([
            'username' => 'required|min:5|unique:table_user',
            'fullname' => 'required', 
            'email' => 'required|email|unique:table_user',
            'password' => 'required|min:5' 
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);

        $request->session()->flash('success', 'Registration successful. Please login.');
        return redirect('/login')->with('message', 'Registration successful. Please login.');
    }
}