<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
            'body' => 'required',
            'photo' => 'required|image|max:1000',
        ]);

        $tags = $request['tags'];

        $route_img = $request['photo']->store('posts', 'public');
        $img = Image::make(public_path("storage/{$route_img}"))->fit(800, 600);
        $img->save();

        $post = new Post($data);
        $post->published_at = Carbon::now();
        $post->user_id = auth()->user()->id;
        $post->photo = $route_img;
        $post->setSlugAttribute();
        $post->save();
        $post->tags()->sync($tags);

        return redirect()->route('posts.index')->with('status', 'Post created succesfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comments = PostComment::where('post_id', '=' , $post->id)->get();
        return view ('post.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
            'body' => 'required',
        ]);

        $tags = $request['tags'];

        if($request['photo']){
            $imagen = $post->photo;
            if(File::exists('storage/'.$imagen)){
                File::delete('storage/'.$imagen);
            }
            $route_img = $request['photo']->store('posts', 'public');
            $img = Image::make(public_path("storage/{$route_img}"))->fit(800, 600);
            $img->save();
            $post->photo = $route_img;
        }

        $post->title = $data['title'];
        $post->category_id = $data['category_id'];
        $post->body = $data['body'];
        $post->published_at = Carbon::now();
        $post->user_id = auth()->user()->id;
        $post->setSlugAttribute();
        $post->save();
        $post->tags()->sync($tags);

        return redirect()->route('posts.index')->with('status', 'Post updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $imagen = $post->photo;

        if(File::exists('storage/'.$imagen)){
            File::delete('storage/'.$imagen);
        }

       $post->delete();
       return redirect()->route('posts.index')->with('status', 'Post deleted succesfully.');
    }
}
