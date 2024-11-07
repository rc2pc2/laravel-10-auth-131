<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth"); // < OGNI metodo di questo controller deve prima passare per il middleware auth
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd(Category::all()->pluck("id"));
        $posts = Post::paginate(10);
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.posts.create", compact("post", "categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated(); // ! tutto quello che non e' validato non passa
        // dd($data);
        $post = Post::create($data);
        // % prendi ogni tag in $data["tags"] e associali al mio post ,e quelli che non sono in $data["tags"] rimuovili
        if (isset($data["tags"])){
            $post->tags()->sync($data["tags"]);
        } else {
            $post->tags()->detach();
        }


        return redirect()->route("admin.posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) // # automatizza una findOrFail con l'id del post ricevuto
    {
        // $post = Post::findOrFail($id);
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.posts.edit", compact("post", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        if (isset($data["tags"])){
            $post->tags()->sync($data["tags"]);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route("admin.posts.show", $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("admin.posts.index");
    }

    public function metodoCustom(Post $post){
        dd($post);
    }

}
