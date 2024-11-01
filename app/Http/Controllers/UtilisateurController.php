<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UtilisateurController extends Controller
{
        public function index(){
            $users = Utilisateur::all();
            // return dd($users);
            return view('admin.showUsers', compact('users'));
    }
}
