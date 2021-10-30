<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Report;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Storage;

class DownloadController extends Controller
{
    // view download page
    public function index($file_id)
    {
        // Get file data
        $file = Upload::where('file_id', $file_id)->first();
        // Get blog posts
        $posts = Post::orderbyDesc('id')->limit(4)->get();
        // if data not null
        if ($file != null) {
            return view('pages.download', ['file' => $file, 'posts' => $posts]);
        } else {
            // Abort 404
            return abort(404);
        }
    }

    // Request file
    public function request_file($authorized, $file_id)
    {
        // Get file data
        $file = Upload::where('id', $authorized)->where('file_id', $file_id)->first();
        // if data not null
        if ($file != null) {
            // Create session
            Session::put($file_id, $file_id);
            // success response with link
            return response()->json([
                'download_link' => route('file.download', [$file->id, $file->file_id]),
            ]);
        } else {
            // Error response
            return response()->json([
                'error' => __('File download problem, try again later'),
            ]);
        }
    }

    // Download file
    public function downloadFile($authorized, $file_id)
    {
        // Get file data
        $file = Upload::where('id', $authorized)->where('file_id', $file_id)->first();
        // if data not null
        if ($file != null) {
            if (Session::has($file_id)) {
                $file_id = $file->file_id; // file id
                $file_type = $file->file_type; // file type
                $oldFilename = $file_id . '.' . $file_type; // file name
                $originalFileName = str_replace('.' . $file_type, '', $file->main_filename); // Original name without extension
                $filename = $originalFileName . '_' . $file_id . '.' . $file_type;
                // check file storage
                if ($file->method == 1) {
                    $file_path = "filebob/uploads/storage/" . $filename;
                    $file_path2 = "filebob/uploads/storage/" . $oldFilename;
                    if (file_exists($file_path)) {
                        Session::flush();
                        Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return \Response::download($file_path);
                    } elseif (file_exists($file_path2)) {
                        Session::flush();
                        Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return \Response::download($file_path2);
                    } else {
                        // Abort 404
                        return abort(404);
                    }
                } elseif ($file->method == 2) {
                    if (Storage::disk('s3')->has($filename)) {
                        Session::flush();
                        $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return redirect(Storage::disk('s3')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
                    } elseif (Storage::disk('s3')->has($oldFilename)) {
                        Session::flush();
                        $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return redirect(Storage::disk('s3')->temporaryUrl($oldFilename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
                    } else {
                        // Abort 404
                        return abort(404);
                    }
                } elseif ($file->method == 3) {
                    if (Storage::disk('wasabi')->has($filename)) {
                        Session::flush();
                        $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return redirect(Storage::disk('wasabi')->temporaryUrl($filename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
                    } elseif (Storage::disk('wasabi')->has($oldFilename)) {
                        Session::flush();
                        $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return redirect(Storage::disk('wasabi')->temporaryUrl($oldFilename, now()->addHour(), ['ResponseContentDisposition' => 'attachment']));
                    } else {
                        // Abort 404
                        return abort(404);
                    }
                } elseif ($file->method == 4) {
                    if (Storage::disk('b2')->has($filename)) {
                        Session::flush();
                        $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return Storage::disk('b2')->download($filename);
                    } elseif (Storage::disk('b2')->has($oldFilename)) {
                        Session::flush();
                        $update_downloads = Upload::where('file_id', $file_id)->increment('downloads', 1);
                        return Storage::disk('b2')->download($oldFilename);
                    } else {
                        return abort(404);
                    }
                }
            } else {
                // Abort 404
                return abort(404);
            }
        } else {
            // Abort 404
            return abort(404);
        }
    }

    // Report file
    public function report($file_id, Request $request)
    {
        // validator
        $validator = Validator::make($request->all(), [
            'report_reason' => ['required', 'string', 'max:200'],
        ]);

        // Send errors to view page
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create new report
        $message = Report::create([
            'report_fileId' => $file_id,
            'report_reason' => $request['report_reason'],
        ]);

        // If report created
        if ($message) {
            // Back with success message
            $request->session()->flash('success', 'Thank you, your report has been sent.');
            return redirect()->back();
        }
    }
}
