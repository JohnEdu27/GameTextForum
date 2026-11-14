<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function displayRegister() {
        return view('Account.register');
    }

    public function register(Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8'],
        ]);

    $user = User::create($data); // hashed by the cast

    Auth::login($user);
    $request->session()->regenerate();
    return redirect('/homepage');

    }


// Show the login view
    public function displayLogin() {
        return view('Account.login'); // Change to 'auth.login' if your file is in views/auth/
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/homepage');
        }

        return back()
            ->withErrors(['email' => 'Invalid email or password.'])
            ->onlyInput('email');
    }



        // ... inside your authController class:

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

         return redirect('/login');
    }
}