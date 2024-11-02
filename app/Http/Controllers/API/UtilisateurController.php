<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Dflydev\DotAccessData\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Utilisateur::withTrashed()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fillables = $request->all();
        $fillables["password"] = Hash::make($fillables["password"]);
        $utilisateur = Utilisateur::create($fillables);
        return response()->json($utilisateur);
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        //
        return response()->json($utilisateur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
        $fillables = $request->all();
        $fillables["password"] = Hash::make($fillables["password"]);
        $utilisateur->fill($fillables);
        $utilisateur->save();
        return response()->json($utilisateur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
        $utilisateur->delete();
        return response()->json([
            "message" => "l'utilisateur numero " . $utilisateur->id . " est bien supprimee.",
            "id" => $utilisateur->id,
        ]);
    }
}
