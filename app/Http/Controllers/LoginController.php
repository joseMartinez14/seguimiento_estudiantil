<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    public function authenticate(Request $request){
        // Retrive Input
        $credentials = $request->only('id', 'password');
        return $credentials;
        if (Auth::attempt($credentials)) {
            // if success login
            $rol = Auth::user()->rol;
                if($rol == 3){
            return redirect('dashboard');
                }
            //return redirect()->intended('/details');
        }
        // if failed login
        return redirect('login');
    }
}