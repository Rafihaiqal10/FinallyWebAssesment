<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register()
    {
        return view('Login.register',[
            'title' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:225',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        $request->session()->flash('success', "Register Berhasil, silahkan login!");

        return redirect('/Login/login');

    }

}
