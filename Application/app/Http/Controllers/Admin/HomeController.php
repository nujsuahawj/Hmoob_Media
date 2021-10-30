<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // View hero background page
    public function hero()
    {
        $home_settings = DB::table('home_settings')->find(1);
        return view('admin.hero', ['home_settings' => $home_settings]);
    }

    // Update hero background
    public function hero_store(Request $request)
    {
        $home_settings = DB::table('home_settings')->find(1);

        $validator = Validator::make($request->all(), [
            'hero' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        // Get image size
        $data = getimagesize($request->hero);
        $width = $data[0];
        $height = $data[1];

        // Check image size
        if ($width != 622 && $height != 948) {
            return redirect()->back()->withErrors(['Background must be (622x948) the image that you upload is (' . $width . 'x' . $height . ')']);
        }

        if ($request->hasFile('hero')) {
            $file = $request->file('hero');
            $fileType = $file->getclientoriginalextension();
            $imageName = "hero-bg" . '.' . $fileType;
            $path = 'images/sections/';
            if (file_exists($path . $home_settings->hero)) {
                $deleteOldImage = File::delete($path . $home_settings->hero);
            }
            $upload = $file->move($path, $imageName);
            if ($upload) {
                $update = DB::table('home_settings')->where('id', 1)->update([
                    'hero' => $imageName,
                ]);
                $request->session()->flash('success', 'Background updated successfully');
                return back();

            } else {
                return redirect()->back()->withErrors(['Upload error']);
            }

        } else {
            return redirect()->back()->withErrors(['Upload error']);
        }
    }

    // View text and button page
    public function textButton()
    {
        $home_settings = DB::table('home_settings')->find(1);
        return view('admin.text-button', ['home_settings' => $home_settings]);
    }

    // Text and button store
    public function textButton_store(Request $request)
    {
        $home_settings = DB::table('home_settings')->find(1);

        $validator = Validator::make($request->all(), [
            'center_text' => ['required', 'max:255'],
            'center_button' => ['required', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Update info
        $update = DB::table('home_settings')->update([
            'center_text' => $request->center_text,
            'center_button' => $request->center_button,
        ]);

        $request->session()->flash('success', 'Updated successfully');
        return back();
    }
}
