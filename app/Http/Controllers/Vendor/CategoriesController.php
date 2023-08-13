<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        return view('vendor.categories.index', compact('categories'));
    }

    public function create()
    {

        return view('vendor.categories.create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('vendor.categories.index');
    }

    public function edit(Category $category)
    {

        return view('vendor.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->name=$request->name;
        $category->save();
        return redirect()->route('vendor.categories.index');
    }

    public function show(Request $request,Category $id)
    {
        return view('vendor.categories.show', compact('id'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
