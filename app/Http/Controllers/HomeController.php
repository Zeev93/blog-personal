<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $posts = Post::orderByDesc('id')->get();;
        return view('home', compact('posts', 'categories'));
    }

    public function visitPost(Post $post){

        $comments = PostComment::where('post_id', '=' , $post->id)->get();
        $categories = Category::all();
        return view('visit', compact('post', 'categories', 'comments'));
    }
}
