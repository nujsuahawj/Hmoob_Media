<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    // View ads page
    public function index()
    {
        // Get ads data
        $ads = DB::table('ads')->find(1);
        return view('admin.ads', ['ads' => $ads]);
    }

    // Update ads
    public function adsStore(Request $request)
    {
        // Find Ads table
        $Ads = DB::table('ads')->find(1);

        // If Ads table null create it
        if ($Ads == null) {
            // Create Ads table with id = 1
            $createAdsTable = DB::table('ads')->insert(['id' => 1]);
        }

        // Update Ads
        $updateAds = DB::table('ads')->where('id', 1)->update([
            'home_1' => $request['home_1'],
            'home_2' => $request['home_2'],
            'mobile' => $request['mobile'],
            'download_1' => $request['download_1'],
            'download_2' => $request['download_2'],
            'download_3' => $request['download_3'],
            'blog_1' => $request['blog_1'],
            'blog_2' => $request['blog_2'],
            'blog_3' => $request['blog_3'],
        ]);

        // if update
        if ($updateAds) {
            // Success response
            return response()->json([
                'success' => 'Updated Successfully',
            ]);
        } else {
            // Error response
            return response()->json([
                'error' => ['Nothing changed on the form'],
            ]);
        }
    }
}
