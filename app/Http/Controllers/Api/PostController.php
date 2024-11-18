<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = Post::with("category", "user", "tags", "user.posts")->orderBy("created_at", "DESC")->paginate(12);
        return response()->json([
                "success" => true,
                "results" => $posts,
        ]);
    }

    public function show(Post $post){
        $post = Post::with("user")->findOrFail($post->id);

        return response()->json([
            "success" => true,
            "results" => $post,
        ]);
    }

    // public function destroy(Post $post){
    //     $post->delete();
    //     return response()->noContent();
    // }
}
