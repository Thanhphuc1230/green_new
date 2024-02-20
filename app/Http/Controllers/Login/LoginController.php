<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{   

    public function getLogin()
    {
        return view('login.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();

        if (!$user->exists) {
            return back()->with(['error' => 'This account does not exist']);
        }
    
        if ($user->email_verified_at === null) {
            return back()->with(['error' => 'Please confirm your email']);
        }
    
        $login = [
            'email'    => $request->username,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($login)) {
            $redirectRoute = Auth::user()->level == 1 || Auth::user()->level == 2
                ? 'admin.page.index'
                : 'website.index';
    
            $request->session()->regenerate();
            return redirect()->route($redirectRoute)->with('success', 'Login success.');
        }
    
        return back()->with(['error' => 'Email or password wrong. Please enter again']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('getLogin');
    }
}
