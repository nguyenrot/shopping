<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use Authenticatable;
    public function loginAdmin(){
        if (auth()->check()){
            return redirect()->to('home');
        }
        return view('login_admin');
    }
    public function postLoginAdmin(Request $request){
        $remember = $request->has('remember_me') ? true:false;
        if (auth()->attempt([
            'email' =>$request->email,
            'password' => $request->password,
        ],$remember)){
            return redirect()->to('home');
        }
        return redirect()->to('admin');
    }
    public function logoutAdmin(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('admin');
    }
}
