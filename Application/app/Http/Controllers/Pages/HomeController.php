<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Post;
use DB;

class HomeController extends Controller
{
    // view home page
    public function index()
    {
        $posts = Post::orderbyDesc('id')->limit(4)->get();
        $home_settings = DB::table('home_settings')->find(1);
        $features = Feature::all();
        return view('pages.home', ['posts' => $posts, 'home_settings' => $home_settings, 'features' => $features]);
    }
}
