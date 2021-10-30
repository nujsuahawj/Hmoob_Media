<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;

class UploadsController extends Controller
{

    // View uploadss
    public function index(Request $request)
    {
        // on search
        if ($request->input('q')) {
            $q = $request->input('q');
            $uploads = Upload::where('main_filename', 'LIKE', '%' . $q . '%')
                ->orWhere('file_id', 'like', '%' . $q . '%')
                ->orWhere('id', 'like', '%' . $q . '%')
                ->orderbyDesc('id')
                ->get();
        } else {
            // uploads data
            $uploads = Upload::orderbyDesc('id')->with('user')->paginate(15);
        }

        return view('admin.uploads', ['uploads' => $uploads]);
    }

    // Delete file
    public function deleteAdminFile($id)
    {
        // get file data
        $file = Upload::where('id', $id)->first();
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
            $delete = Upload::where('id', $id)->delete();
            if ($delete) {
                // success response
                return response()->json(['success' => 'File deleted successfully']);
            }
        } else {
            // error response
            return response()->json(['error' => 'Please refresh page and try agian']);
        }
    }

    // View file
    public function viewFile($file_id)
    {
        // Get file data
        $upload = Upload::where('file_id', $file_id)->with('user')->first();
        // if data not null
        if ($upload != null) {
            // Retrun to view with file data
            return view('admin.view.upload', ['upload' => $upload]);
        } else {
            // Abort 404 if data is null
            abort(404);
        }

    }

    // Download files
    public function downloadFile($file_id)
    {
        // Get file data
        $file = Upload::where('file_id', $file_id)->first();
        $file_id = $file->file_id; // file id
        $file_type = $file->file_type; // file type
        $oldFilename = $file_id . '.' . $file_type; // file name
        $originalFileName = str_replace('.' . $file_type, '', $file->main_filename); // Original name without extension
        $filename = $originalFileName . '_' . $file_id . '.' . $file_type;
        // if data not null
        if ($file->method == 1) {
            $file_path = "filebob/uploads/storage/" . $filename;
            $file_path2 = "filebob/uploads/storage/" . $oldFilename;
            if (file_exists($file_path)) {
                return \Response::download($file_path);
            } elseif (file_exists($file_path2)) {
                return \Response::download($file_path2);
            } else {
                // Abort 404
                return abort(404);
            }
        } elseif ($file->method == 2) {
            if (Storage::disk('s3')->has($filename)) {
                return redirect(Storage::disk('s3')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
            } elseif (Storage::disk('s3')->has($oldFilename)) {
                return redirect(Storage::disk('s3')->temporaryUrl($oldFilename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
            } else {
                // Abort 404
                return abort(404);
            }
        } elseif ($file->method == 3) {
            if (Storage::disk('wasabi')->has($filename)) {
                return redirect(Storage::disk('wasabi')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
            } elseif (Storage::disk('wasabi')->has($oldFilename)) {
                return redirect(Storage::disk('wasabi')->temporaryUrl($oldFilename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
            } else {
                // Abort 404
                return abort(404);
            }
        } elseif ($file->method == 4) {
            if (Storage::disk('b2')->has($filename)) {
                return Storage::disk('b2')->download($filename);
            } elseif (Storage::disk('b2')->has($oldFilename)) {
                return Storage::disk('b2')->download($oldFilename);
            } else {
                return abort(404);
            }
        } else {
            // Abort 404
            return abort(404);
        }
    }
}
