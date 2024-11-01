<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('admin.showCategories', compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
        $category = $request->validated();
        Category::create($category);
        return redirect()->back()->with("success", 'the product ' . $category["name"] . ' add');
    }
    public function destroy(Category $category)
    {
        // $deletedCategory = Category::find($request->id);
        $category->delete();
        return redirect()->back()->with("success", 'the product ' . $category["name"] . ' deleted');
    }
    public function update(CategoryRequest $request, Category $category)
    {
        // return dd($request);
        // $updatedCategory = Category::find($request->id);
        $category->update($request->validated());
        return redirect()->back()->with("success", 'the product ' . $category["id"] . ' updated');
    }
    public function deleteAll()
    {
        Category::query()->delete();
        return redirect()->back()->with("success", "You Have deleted All Categories.");
    }
    
}
