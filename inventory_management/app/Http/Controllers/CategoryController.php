<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index():View
    {
        $categories = category::latest()->get();
        return view('category.index', compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $category = new category();
        $category->name = $request->name;
        $category->slug = str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }
}
