<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UtilisateurController as APIUtilisateurController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\WebController;

// login routing
Route::get('/login', [LoginController::class,"index"])->name("login");
Route::post('/login/check', [LoginController::class,"check"])->name("check");
Route::post('/logout', [LoginController::class,"logout"])->name("logout");
Route::get('/connect', [LoginController::class,"connect"])->name("index");

//signup routing
Route::resource("signup",SignUpController::class);
// Route::get('/signup/create', [SignUpController::class,"create"])->name("signup.index");
// Route::post('/signup', [SignUpController::class,"store"])->name("create");

//utilisateur routing
Route::resource("users",UtilisateurController::class);

// admin
Route::get('/admin', [AdminController::class,"index"])->name("admin");

// Route::get('/users', [AdminController::class,"users_show"])->name("showUsers");
// Route::get('/categories', action: [AdminController::class,"categories_show"])->name("showCategories");

Route::resource("products",ProductController::class);
// Route::get('/products', action: [ProductController::class,"index"])->name("products.index");
// Route::DELETE("/products/destroy", [ProductController::class,"destroy"])->name("products.destroy");
// Route::PUT("/products/update", [ProductController::class,"update"])->name("products.update");
// Route::post("/products/create", [ProductController::class,"create"])->name("products.create");
// Route::delete("/products/deleteAll", [ProductController::class,"deleteAll"])->name("products.deleteAll");
// Route::delete("/products/deleteall", [ProductController::class, "deleteAllProducts"])->name("products.deleteall");
Route::post("/products/deleteall", [ProductController::class, "deleteAllProducts"])->name("products.deleteall");
// Route::get("/products/showProducts", [ProductController::class, "show"])->name("products.showProducts");


// categories routing
Route::resource("categories",CategoryController::class);
Route::post("/categories/deleteAll", [CategoryController::class,"deleteAll"])->name("categories.deleteAll");
// Route::get("/categories/showCategories", [CategoryController::class, "show"])->name("categories.showCategories");
// Route::DELETE("/categories/destroy", [CategoryController::class,"category_destroy"])->name("category.destroy");
// Route::PUT("/categories/update", [CategoryController::class,"category_update"])->name("category.update");
// Route::post("/categories/create", [CategoryController::class,"category_create"])->name("category.create");

// Web Routing

Route::get("/home", [WebController::class, "showHomePage"])->name("home");
Route::get("/Products", [WebController::class, "showProductsPage"])->name("products");
Route::get("/{category:name}", [WebController::class, "showCategoryPage"])->name("categories");
Route::get('/show/{product:name}', [WebController::class, 'showProductPage'])->name('product');
// Panier Routing
Route::get("/panier/product", [PanierController::class, "afficher"])->name("p");
Route::resource("panier",PanierController::class);
Route::post("/panier", [PanierController::class, "creer"])->name("panier.store");

// Route::resource("panier",ProductController::class);
// Route::apiResource("utilisateur",APIUtilisateurController::class);
Route::get("/u/y", [APIUtilisateurController::class,"index"])->name("u");