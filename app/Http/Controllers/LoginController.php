<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function connect(){
        return view("index");
    }
    public function index()  {
        return view('login.login');
    }
    public function check(LoginRequest $request){
        // Get validated credentials (email and password)
        $credentials = $request->validated();
        // $utilisateur = Utilisateur::where("email", "=",$credentials["email"])->first();
        // return dd($utilisateur->password,Hash::make($credentials["password"]));
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
        //     // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();
        //     // Redirect to the index page with a success message
            return redirect()->route('index')->with('success', 'You are now connected.');
        }else{

            return back()->withErrors([
                'email' => 'Email or password are incorrect.',
            ])->onlyInput('email');
        }
        // // If authentication fails, return with error message
    }
    public function logout(){
        Session::flush() ;
        Auth::logout();
        return redirect()->route('login');
    }
}
