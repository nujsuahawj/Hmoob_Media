<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderbyDesc('id')->get();
        return view('admin.categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add.category');
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
            'category_name' => ['required', 'string', 'unique:categories'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $create = Category::create([
            'category_name' => $request->category_name,
        ]);

        if ($create) {
            $request->session()->flash('success', 'Category created successfully');
            return redirect()->route('categories');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.edit.category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($request->category_name != $category->category_name) {
            $validator = Validator::make($request->all(), [
                'category_name' => ['required', 'string', 'unique:categories'],
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'category_name' => ['required', 'string'],
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $update = Category::where('id', $category->id)->update([
            'category_name' => $request->category_name,
        ]);

        if ($update) {
            $request->session()->flash('success', 'Category updated successfully');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $posts = Post::where('category', $category->id)->get();
        if ($posts->count() > 0) {
            return redirect()->back()->withErrors(['This category has a posts please delete them first']);
        } else {
            $category->delete();
            session()->flash('success', 'Category deleted successfully');
            return back();
        }

    }
}
