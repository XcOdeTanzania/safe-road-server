<?php

namespace App\Http\Controllers;


use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Report as ReportResource;
use Maatwebsite\Excel\Facades\Excel;

use App\Station;

class ReportController extends Controller
{
    public function getReports()
    {
        // Get reports
        $reports = Report::orderBy('created_at', 'desc');

        // Return collection of reports as a resource
        //return ReportResource::collection($reports);
         return response()->json(['reports'=> Report::all(),'status'=>true], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReport(Request $request, $stationId)
    {
          
         $station = Station::find($stationId);
         
         if(!$station){
          return response()->json(['message' => 'station not found', 'status' => false], 404);
         }
        
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
        $report->report_id = $request->input('report_id');
        $report->uid = $request->input('uid');

        $report->image = $this->path;
        $station->reports()->save($report);

        return response()->json(['report'=> $report, 'status'=>true], 200, [], JSON_NUMERIC_CHECK);
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
            return response()->json(['report'=> 'report deleted successfully', 'status'=>true]);
        }
    }
    
    
    
    public function viewFile($reportId)
    {
        $report = Report::find($reportId);
        if (!$report) {
            return response()->json(['message' => 'Report not found', 'status' => false], 404);
        }

        $pathToFile = storage_path('/app/' . $report->image);



        return response()->download($pathToFile);
    }

   
}
