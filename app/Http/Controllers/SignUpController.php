<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index()  {
        return view('login.sign-up');
    }
    public function store(SignUpRequest $request){
        // Validate the form fields
        $formFields = $request->validated();
        
        // Hash the user's password
        $formFields['password'] = Hash::make($request->password);  
        
        // Create the new user in the database
        Utilisateur::create($formFields);
        
        // Redirect to the index page with a success message
        return redirect("users")->with("success", "You are now a member of the team.");
    }
}
