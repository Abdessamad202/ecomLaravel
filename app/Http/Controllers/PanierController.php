<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    // Display the panier view
    public function afficher()
    {
        $panier = Panier::all();
        $productsPanier = [];
        foreach ($panier as $item) {
            # code...
            $product = Product::find($item->id_product);
            $product["quantity"] = $item->quantity;
            $product["id_panier"] = $item->id;
            $productsPanier[$item->id] = $product;
        }
        // return dd($panier,$productsPanier);
        return view("front.panier", compact("panier", "productsPanier"));
    }

    // Store product in the panier
    public function creer(Request $request)
    {
        // Validate request data
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);
        $ifProductExist = Panier::where("id_product",$request->product_id)->first();
        if ($ifProductExist === null) {
            Panier::create([
                'id_product' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        } else {
            $ifProductExist->quantity += $request->quantity;
            $ifProductExist->save();
        }
        // Create new Panier entry

        // Redirect to panier route
        return redirect()->route("p");
    }
    public function destroy(Panier $panier){
        $panier->delete();
        return redirect()->back();
    }
}

