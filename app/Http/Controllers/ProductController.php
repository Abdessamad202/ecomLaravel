<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth')->except(["index"]);
    // }
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        foreach ($products as $product) {
            $category = Category::find($product->category_id);
            if ($category !== null) {
                $product->category = $category->name;
            }
        }
        // return dd($products,$categories);
        return view('admin.showProducts', compact('products', "categories"));
    }
    public function store(ProductRequest $request)
    {
        $product = $request->validated();
        $product["image"] = $request->file('image')->store("products", "public");
        // $product["image"] = $image;
        Product::create($product);
        // return dd($product);

        return redirect()->back()->with('success', 'the product ' . $product["name"] . ' is add');
    }
    public function destroy(Product $product)
    {
        // $product = Product::find($request->id);
        $product->delete();
        return redirect()->back()->with('success', 'the product ' . $product->name . ' is deleted');
    }
    public function update(ProductRequest $request,Product $product)
    {
        // $product = Product::find($request->id);
        $infoUpdate = $request->validated();
        // $infoUpdate["id_category"] = $request->id_category;
        // Check if the image is provided
        if ($request->hasFile('image')) {
            // Store new image if uploaded
            $infoUpdate['image'] = $request->file('image')->store('products', 'public');
        } else {
            // Keep the existing image
            $infoUpdate['image'] = $product->image;
        }

        $product->update($infoUpdate);

        return redirect()->back()->with('success', 'Product ' . $product->id . ' updated successfully.');
    }

    public function deleteAllProducts()
    {
        // return dd(Product::all());
        // Get all products
        $products = Product::all();
        // Check if the collection is empty
        if ($products->isEmpty()) {
            // If no products, return back with an error message
            return redirect()->back()->with('error', 'No products to delete.');
        }else{
            Product::query()->delete();
            return redirect()->back()->with('success', 'All products deleted successfully!');

        }
        // If there are products, delete them

        // Return with success message
    }
    
}
