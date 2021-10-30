<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;

class FilesController extends Controller
{
    // View user files
    public function index(Request $request)
    {
        $authId = Auth::user()->id; // user id
        // on search
        if ($request->input('q')) {
            $q = $request->input('q');
            $uploads = Upload::where([['user_id', $authId], ['main_filename', 'LIKE', '%' . $q . '%']])
                ->orWhere([['user_id', $authId], ['file_id', 'like', '%' . $q . '%']])
                ->orWhere([['user_id', $authId], ['id', 'like', '%' . $q . '%']])
                ->orderbyDesc('id')
                ->get();
        } else {
            // user uploads data
            $uploads = Upload::where('user_id', $authId)->with('user')->orderbyDesc('id')->paginate(12);
        }

        return view('pages.user.files', ['uploads' => $uploads]);
    }

    // delete file
    public function deleteFile($id)
    {
        $authID = Auth::user()->id;
        // get file data
        $file = Upload::where([['user_id', $authID], ['id', $id]])->first();
        // if data not null
        if ($file != null) {
            // if storage is local server
            if ($file->method == 1) {
                $theFile = str_replace(url('/') . '/', '', $file->file_path);
                if (file_exists($theFile)) {
                    $delete = File::delete($theFile);
                }
            } elseif ($file->method == 2) {
                $path = parse_url($file->file_path, PHP_URL_PATH);
                if (Storage::disk('s3')->has($path)) {
                    // Delete file from amazon s3
                    $delete = Storage::disk('s3')->delete($path);
                }
            } elseif ($file->method == 3) {
                $path = parse_url($file->file_path, PHP_URL_PATH);
                if (Storage::disk('wasabi')->has($path)) {
                    // Delete file from wasabi s3
                    $delete = Storage::disk('wasabi')->delete($path);
                }
            } elseif ($file->method == 4) {
                $path = parse_url($file->file_path, PHP_URL_PATH);
                if (Storage::disk('b2')->has($path)) {
                    // Delete file from backblaze
                    $delete = Storage::disk('b2')->delete($path);
                }
            } else {
                // error response
                return response()->json(['error' => 'Unknown error']);
            }

            // Delete from database
            $delete = Upload::where([['user_id', $authID], ['id', $id]])->delete();
            if ($delete) {
                // success response
                return response()->json(['success' => 'File deleted successfully']);
            }
        } else {
            // error response
            return response()->json(['error' => 'Please refresh page and try agian']);
        }
    }

}
