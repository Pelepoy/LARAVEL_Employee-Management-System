<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            $validated = $request->validate([
                "name" => ['required', 'min:2'],
                "email" => ['required', 'email', 'unique:users,email'],
                "password" => ['required', 'min:8', 'confirmed'],
            ]);

            $validated['password'] = bcrypt($validated['password']);

            $user = User::create($validated);
            $user->timestamps = true;
            $user->remember_token = csrf_token();
            $user->email_verified_at = now();
            $user->save();

            return redirect('login')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the user.']);
        }
    }

    public function login()
    {
        if (View::exists('users.login')) {
            return view('users.login');
        } else {
            return abort(404);
        }
    }

    public function authenticate(Request $request)
    {

        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => ['required'],
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('employee.index')->with('success', 'User logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // dd($request);
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'User logged out successfully.');
    }
}
