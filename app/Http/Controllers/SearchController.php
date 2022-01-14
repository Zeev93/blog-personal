<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchByTag(Tag $tag){
        $categories = Category::all();
        $searchTitle = $tag->name;
        $idTag = $tag->id;
        $posts = Post::whereHas('tags', function ($q) use ($idTag) {
            $q->where('tag_id', $idTag);
        })->get();

        return view ('home', compact('posts', 'searchTitle', 'categories'));
    }

    public function searchByCategory(Category $category){
        $categories = Category::all();
        $searchTitle = $category->name;
        $posts = Post::where('category_id', '=' , $category->id)->get();
        return view ('home', compact('posts', 'searchTitle', 'categories'));
    }

}
