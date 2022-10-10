<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

    public function access()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            $response = Http::post(env('API_BASE_URL') . '/login', $credentials);

            if ($response->status() == 401) {
                return back()->withErrors(['email' => 'Las credenciales no coinciden.']);
            } else {
                $user->token = $response->json()['token'];
                Auth::login($user);
                Cache::put('token', $response->json()['token']);
                return redirect()->intended('/');
            }
        }
        return back()->withErrors([
            'email' => 'Usuario no registrado',
        ]);
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        $data['abilities'] = ['read'];
        //send post request to api
        $response = Http::post(env('API_BASE_URL') . '/register', $data);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'token' => $response['content']['token'],
        ]);

        auth()->login($user);

        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::logout();
        Cache::forget('token');
        return redirect()->route('home');
    }
}
