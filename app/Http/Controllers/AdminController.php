<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.admin");
    }
}
