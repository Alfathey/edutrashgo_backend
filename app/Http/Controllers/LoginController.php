<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login.index",[
            'title'=> 'Login',
            'active'=> 'login',
        ]);
    }

    public function authenticate(Request $request)
    {

        // dd($request);

        $credentials = $request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);
        // dd($credentials);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post(route('api.login'), [
            'username' => $credentials['username'],
            'password' => $credentials['password']
        ]);

        dd($response);

        if ($response->successful()) {
            $data = $response->json();
            $request->session()->put('api_token', $data['token']);
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('api_token');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
