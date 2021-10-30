<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderbyDesc('id')->get();
        return view('admin.posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderbyDesc('id')->get();
        return view('admin.add.post', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'image' => ['required', 'mimes:png,jpg,jpeg'],
            'content' => ['required'],
            'short_description' => ['required', 'max:200'],
            'category' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $category = Category::where('id', $request->category)->first();
        if ($category == null) {
            return redirect()->back()->withErrors(['Category error']);
        }

        $file = $request->file('image');
        $string = Str::random(15);
        $fileType = $file->getclientoriginalextension();
        $imageName = $string . '.' . $fileType;
        $path = 'images/blog/';

        if (!File::exists($path)) {
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        }

        $filter_title = str_replace(' ', '-', $request->title);
        $slug = time() . '-' . strtolower($filter_title);

        $upload = $file->move($path, $imageName);

        if ($upload) {
            $create = Post::create([
                'slug' => $slug,
                'title' => $request->title,
                'image' => $imageName,
                'content' => $request->content,
                'short_description' => $request->short_description,
                'category' => $request->category,
            ]);
            if ($create) {
                $request->session()->flash('success', 'Post has been published');
                return redirect()->route('posts');
            }
        } else {
            return redirect()->back()->withErrors(['Upload error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderbyDesc('id')->get();
        return view('admin.edit.post', ['post' => $post, 'categories' => $categories]);
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
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'image' => ['mimes:png,jpg,jpeg'],
            'content' => ['required'],
            'short_description' => ['required', 'max:200'],
            'category' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $category = Category::where('id', $request->category)->first();
        if ($category == null) {
            return redirect()->back()->withErrors(['Category error']);
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $string = Str::random(15);
            $fileType = $file->getclientoriginalextension();
            $imageName = $string . '.' . $fileType;
            $path = 'images/blog/';

            if (!File::exists($path)) {
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            }

            if (file_exists($path . $post->image)) {
                $deleteOldImage = File::delete($path . $post->image);
            }

            $upload = $file->move($path, $imageName);

            if ($upload) {
                $update = Post::where('id', $post->id)->update([
                    'title' => $request->title,
                    'image' => $imageName,
                    'content' => $request->content,
                    'short_description' => $request->short_description,
                    'category' => $request->category,
                ]);
                if ($update) {
                    $request->session()->flash('success', 'Post updated successfully');
                    return back();
                }
            } else {
                return redirect()->back()->withErrors(['Upload error']);
            }

        } else {
            $imageName = $post->image;
            $create = Post::where('id', $post->id)->update([
                'title' => $request->title,
                'image' => $imageName,
                'content' => $request->content,
                'short_description' => $request->short_description,
                'category' => $request->category,
            ]);
            if ($create) {
                $request->session()->flash('success', 'Post updated successfully');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $path = 'images/blog/';
        if (file_exists($path . $post->image)) {
            $deleteOldImage = File::delete($path . $post->image);
        }
        $post->delete();
        session()->flash('success', 'Post deleted successfully');
        return back();
    }
}
