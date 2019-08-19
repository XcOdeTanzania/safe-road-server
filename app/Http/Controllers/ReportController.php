<?php

namespace App\Http\Controllers;


use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Report as ReportResource;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function getReports()
    {
        // Get reports
        $reports = Report::orderBy('created_at', 'desc')->paginate(10);

        // Return collection of reports as a resource
        return ReportResource::collection($reports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plat_no' => 'required',
            'message' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        if ($request->hasFile('file')) {
            $this->path = $request->file('file')->store('reports');
        } else {
            return response()->json(['message' => 'Please add an Image',  'status' => false], 404);
        }

        $report = new Report;

        $report->plat_no = $request->input('plat_no');
        $report->message = $request->input('message');

        $report->image = $this->path;
        $report->save();

        return new ReportResource($report);
    }

    public function putReport(Request $request, $reportId)
    {
        $validator = Validator::make($request->all(), [
            'plat_no' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $report = Report::findOrFail($reportId);

        $report->update([
            'plat_no' => $request->input('plat_no'),
            'message' => $request->input('message'),
        ]);
        return new ReportResource($report);
    }

    public function deleteReport($id)
    {
        // Get report
        $report = Report::findOrFail($id);
        if (!$report) {
            return response()->json(['message' => 'report not found', 'status' => false], 404);
        }
        if ($report->delete()) {
            return new ReportResource($report);
        }
    }


   
}
