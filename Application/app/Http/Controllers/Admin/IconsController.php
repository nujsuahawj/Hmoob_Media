<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Icon;
use File;
use Illuminate\Http\Request;
use Validator;

class IconsController extends Controller
{
    // View icons page
    public function index()
    {
        // Get all icons
        $icons = Icon::orderbyDesc('id')->get();
        return view('admin.icons', ['icons' => $icons]);
    }

    // View create icons page
    public function addIcon()
    {
        return view('admin.add.icon');
    }

    // Store new icon
    public function addIconStore(Request $request)
    {
        // Validate form
        $validator = Validator::make($request->all(), [
            'icon_name' => ['required'],
            'icon_path' => ['required', 'mimes:png'],
        ]);

        // Send errors to view page
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $path = "images/icons/"; // Icons path
        $file = $request->file('icon_path'); // requested image
        $fileType = $file->getclientoriginalextension();
        $imageName = strtolower($request->icon_name) . '.' . $fileType; // create file name
        // Check the path
        if (!File::exists($path)) {
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        }
        // Upload file
        $upload = $file->move($path, $imageName);
        // If upload
        if ($upload) {
            // Create icon
            $create = Icon::create([
                'icon_name' => strtolower($request->icon_name),
                'icon_path' => $imageName,
            ]);
            // Success msg
            $request->session()->flash('success', 'Icon has been uploaded');
            return redirect()->route('icons');
        }

    }

    // Delete icon
    public function deleteIcon($id)
    {
        // Get icon
        $icon = Icon::find($id);
        if ($icon) {
            $path = "images/icons/"; // Icons path
            if (file_exists($path . $icon->icon_path)) {
                $deleteOldImage = File::delete($path . $icon->icon_path);
            }
            $icon->delete();
            session()->flash('success', 'Icon deleted successfully');
            return back();
        } else {
            // Abort 404
            return abort(404);
        }

    }
}
