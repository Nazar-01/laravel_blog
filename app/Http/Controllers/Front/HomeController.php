<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 0)->paginate(5);

        return view('front.pages.index', ['posts' => $posts,]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('front.pages.show', ['post' => $post]);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        // $posts = $tag->posts;
        $posts = $tag->posts()->where('status', 0)->paginate(6);

        return view('front.pages.list', ['posts' => $posts]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->where('status', 0)->paginate(6);

        return view('front.pages.list', ['posts' => $posts]);
    }
}
