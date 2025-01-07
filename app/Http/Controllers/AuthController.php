<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'min:3', 'email'],
            'password' => ['required', 'min:3',],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboardKhusus');
        }

        return back()->with('loginError', 'Login Failed');
    }


    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        $roles = Roles::get();
        return view('auth.register', compact('roles'));
    }

    public function storeregis(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'idroles' => ['required'],
        ]);

        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);
        return redirect('/login')->with('status', 'Data berhasil ditambah!');
    }
}
