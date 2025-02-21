<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index():View
    {
        $products = product::latest()->get();
        return view('product.index', compact('products'));
    }
    public function create()
    {
        $categories = category::latest()->get();
        return view('product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|min:6|max:255|unique:categories,name',
        //     'status' => 'required|boolean',
        // ]);

        $product = new product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = str::slug($request->name);
        $product->price = $request->price;
        $product->status = $request->status;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = str::slug($request->name) . '-' . time() . '.' . $extension;
            $path = $file->storeAs('public/products', $filename);
            $product->image = $path;
        }
        $product->save();
        return redirect()->route('product.index')->withInput()->with('success', 'product created successfully');
    }

    // public function edit($id)
    // {
    //     $product = category::findOrFail($id);
    //     return view('category.edit', compact('category'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|min:6|max:255|unique:categories,name,' . $id,
    //         'status' => 'required|boolean',
    //     ]);

    //     $product = category::findOrFail($id);
    //     $product->name = $request->name;
    //     $product->slug = str::slug($request->name);
    //     $product->status = $request->status;
    //     $product->update();
    //     return redirect()->route('category.index')->withInput()->with('success', 'Category created successfully');
    // }

    // public function delete($id)
    // {
    //     $product = category::findOrFail($id);
    //     $product->delete();
    //     return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    // }

    public function status($id)
    {
        $product = product::findOrFail($id);
        $product->status = !$product->status;
        $product->update();
        return redirect()->route('product.index')->with('success', 'product status updated successfully');
    }
}
