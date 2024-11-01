<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function showHomePage()
    {
        $categories = Category::all();
        return view("front.home",compact("categories"));
        // $products = Product::all();
        // if(!$categories->isEmpty()){
        // }else{
        //     return "there is no product";
        // }
    }
    public function showProductsPage()
    {
        $products = Product::all();
        if (!$products->isEmpty()) {
            return view(view: "front.products")->with("products",$products);

            }else{
                return "there is no product";
            }
        }
        public function showCategoryPage(Category $category){
            $categoryChoosed = $category;
            $products = Product::where("category_id",$category->id)->get();
            // return dd($products);
            return view("front.categories",compact("categoryChoosed" ,"products"));
            // return "goood";

        }
        public function showProductPage(Product $product){
            return view("front.product",compact("product"));

        }
    }
// }