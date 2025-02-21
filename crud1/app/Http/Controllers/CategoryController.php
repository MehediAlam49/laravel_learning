<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $categories = category::latest()->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255|min:3|unique:categories,title',
            'description' => 'nullable',
            'status' => 'required |boolean',
        ]);

        $category = new category();
        $category->title = $request->title;
        $category->slug = str::slug($request->title);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'title' => 'required|max:255|min:3|unique:categories,title' . $id,
            'description' => 'nullable',
            'status' => 'required |boolean',
        ]);

        $category = category::findOrFail($id);
        $category->title = $request->title;
        $category->slug = str::slug($request->title);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index')->withInput()->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->withInput()->with('success', 'Category deleted successfully');
    }

    public function status($id)
    {
        $category = category::findOrFail($id);
        $category->status = !$category->status;
        $category->update();
        return redirect()->route('category.index')->with('success', 'Category status updated successfully');
    }
}
