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

    $user = User::create($data);

    Auth::login($user);
    $request->session()->regenerate();
    return redirect('/homepage');

    }


    public function displayLogin() {
        return view('Account.login');
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



    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

         return redirect('/login');
    }



    public function displayforgotpass() {
        return view('Account.forgotpassword');
    }

    public function forgotpass(Request $request) {

    }
}