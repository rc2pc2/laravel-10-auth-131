<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return response()->json([
            "success" => true,
            "results" => $categories,
        ]);
    }

    public function show(Category $category){
        $category = Category::with("posts", "posts.user")->findOrFail($category->id);

        return response()->json([
            "success" => true,
            "results" => $category,
        ]);
    }
}
