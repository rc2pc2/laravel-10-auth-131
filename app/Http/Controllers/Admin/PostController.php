<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth"); // < OGNI metodo di questo controller deve prima passare per il middleware auth
    }


    /**
     * Display a listing of the deleted resources.
     */
    public function deletedIndex()
    {
        $posts = Post::onlyTrashed()->paginate(10);

        return view("admin.posts.deleted-index", compact("posts"));
    }

    public function restore(Post $post){
        $post->restore();
        return redirect()->route("admin.posts.index")
            ->with('message', "Post $post->title has been restored succesfully!")
            ->with('alert-class', "success");
    }

    public function forceDelete(Post $post){
        $post->forceDelete();
        return redirect()->route("admin.posts.deleted-index")
            ->with('message', "Post $post->title has been PERMANENTLY deleted!")
            ->with('alert-class', "danger");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        // dd(Auth::id());
        $data = $request->validated();

        $data["user_id"] = Auth::id();

        // % se esiste un file nel campo image della request
        if ($request->hasFile("image")){
            $filePath = Storage::disk("public")->put("img/posts/", $request->image); //url immagine caricata
            $data["image"] = $filePath;
        }

        $post = Post::create($data);

        if (isset($data["tags"])){
            $post->tags()->sync($data["tags"]);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route("admin.posts.index")
            ->with('message', "Post $post->title has been created successfully!")
            ->with('alert-class', "success");
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

        if ($request->hasFile("image")){
            if ($post->image){
                Storage::disk("public")->delete($post->image);
            }

            $filePath = Storage::disk("public")->put("img/posts/", $request->image); //url immagine caricata
            $data["image"] = $filePath;
        }

        $post->update($data);

        if (isset($data["tags"])){
            $post->tags()->sync($data["tags"]);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route("admin.posts.index")
            ->with('message', "Post $post->title has been updated successfully!")
            ->with('alert-class', "primary");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("admin.posts.index")
            ->with('message', "Post $post->title has been deleted successfully!")
            ->with('alert-class', "danger");
    }
}
