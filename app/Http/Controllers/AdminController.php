<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin_login');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('message', 'Wrong password or email!!');
        }
        // $response = Http::post('http://127.0.0.1:8000/api/auth/login', [
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        
        // dd($response->json()['access_token']);

        // $response2 = Http::withToken($response->json()['access_token'])->post('http://127.0.0.1:8000/api/auth/me');
        // dd($response2->json());
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
