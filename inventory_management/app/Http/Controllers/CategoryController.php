<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index() {
        $categories = category::latest()->get();
        return view('category.index', compact('categories'));
    }
}
