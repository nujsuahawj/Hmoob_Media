<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Str;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::orderbyDesc('id')->get();
        return view('admin.features', ['features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add.feature');
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
            'image' => ['required', 'mimes:png,jpg,jpeg'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $file = $request->file('image');
        $string = Str::random(10);
        $fileType = $file->getclientoriginalextension();
        $imageName = $string . '.' . $fileType;
        $path = 'images/features/';

        if (!File::exists($path)) {
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        }

        $upload = $file->move($path, $imageName);

        if ($upload) {
            $create = Feature::create([
                'image' => $imageName,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            if ($create) {
                $request->session()->flash('success', 'Feature has been published');
                return redirect()->route('features');
            }
        } else {
            return redirect()->back()->withErrors(['Upload error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('admin.edit.feature', ['feature' => $feature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $validator = Validator::make($request->all(), [
            'image' => ['mimes:png,jpg,jpeg'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $string = Str::random(15);
            $fileType = $file->getclientoriginalextension();
            $imageName = $string . '.' . $fileType;
            $path = 'images/features/';

            if (!File::exists($path)) {
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            }

            if (file_exists($path . $feature->image)) {
                $deleteOldImage = File::delete($path . $feature->image);
            }

            $upload = $file->move($path, $imageName);

            if ($upload) {
                $update = Feature::where('id', $feature->id)->update([
                    'image' => $imageName,
                    'title' => $request->title,
                    'description' => $request->description,
                ]);
                if ($update) {
                    $request->session()->flash('success', 'Feature updated successfully');
                    return back();
                }
            } else {
                return redirect()->back()->withErrors(['Upload error']);
            }

        } else {
            $imageName = $feature->image;
            $create = Feature::where('id', $feature->id)->update([
                'image' => $imageName,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            if ($create) {
                $request->session()->flash('success', 'Feature updated successfully');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $path = 'images/features/';
        if (file_exists($path . $feature->image)) {
            $deleteOldImage = File::delete($path . $feature->image);
        }
        $feature->delete();
        session()->flash('success', 'Feature deleted successfully');
        return back();
    }
}
