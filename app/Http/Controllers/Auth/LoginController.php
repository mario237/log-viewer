<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{


    public function showLoginFrom(){
        return view('login');
    }

    public function login(LoginRequest $request)
    {

        $userCredentials = $request->all();

        if (strtolower($userCredentials['username']) == 'admin' && strtolower($userCredentials['password']) == 'admin'){
            session()->put('is-authenticated' , true);
            return redirect()->route('log-view');
        }
        else{
            return redirect()->back()->withErrors(['credentials' => 'invalid credentials']);
        }


    }
}
