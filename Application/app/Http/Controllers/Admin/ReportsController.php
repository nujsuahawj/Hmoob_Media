<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportsController extends Controller
{
    // View report page
    public function index()
    {
        $reports = Report::orderbyDesc('id')->get();
        return view('admin.reports', ['reports' => $reports]);
    }

    // Delete report
    public function delete($id)
    {
        $report = Report::find($id);
        if ($report != null) {
            $report->delete();
            session()->flash('success', 'Report deleted successfully');
            return back();
        } else {
            return back();
        }

    }
}
