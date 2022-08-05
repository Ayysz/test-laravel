<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_act(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'username'=>'required|unique:user',
            'password'=>'required',
            'password_confirm'=>'required|same:password',
        ]);

        $user = new user([
            'name' => $req -> name,
            'username' => $req -> username,
            'password' => Hash::make($req -> password),
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'Registrasi Berhasil. Silahkan Lanjut Login!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }
    
    public function login_act(Request $req)
    {
        $req->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if (Auth::attempt(['username' => $req->username, 'password' => $req->password])){
            $req->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'wrong username or password'
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_act(Request $req)
    {
        $req->validate([
            'old_password'=>'required|current_password',
            'new_password'=>'required|confirmed',
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($req->new_password);
        $user->save();
        $req->session()->regenrate();

        return back()->with('success', 'Password Changed!');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }

}
