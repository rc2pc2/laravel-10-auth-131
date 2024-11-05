<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(){
        $posts = Post::orderBy("created_at", "desc")->paginate(6);
        return view("guest.posts.index", compact("posts"));
    }

    public function show(Post $post){
        return view("guest.posts.show", compact("post"));
    }
}
