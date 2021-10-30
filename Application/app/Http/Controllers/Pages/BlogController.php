<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // View blog page
    public function index(Request $request)
    {
        if (!$request->input('q')) {
            $posts = Post::orderbyDesc('id')->paginate(10);
        } else {
            $q = $request->input('q');
            $posts = Post::orderbyDesc('id')
                ->where('title', 'LIKE', '%' . $q . '%')
                ->orWhere('content', 'LIKE', '%' . $q . '%')
                ->orWhere('slug', 'LIKE', '%' . $q . '%')
                ->get();
        }

        return view('pages.blog', ['posts' => $posts]);
    }

    // View blog post
    public function View_blog_post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post != null) {
            $category = Category::where('id', $post->category)->first();
            $also_likes = Post::where('category', $post->category)->limit(10)->get();
            return view('pages.view.post', ['post' => $post, 'also_likes' => $also_likes, 'category' => $category]);
        } else {
            return abort(404);
        }
    }
}
