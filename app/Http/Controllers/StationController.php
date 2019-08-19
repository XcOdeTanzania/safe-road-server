<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;
use App\Exports\StationsExport;
use App\Exports\StationImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\Station as StationResource;

class StationController extends Controller
{
    public function getStations()
    {
        // Get stations
        $stations = Station::orderBy('created_at', 'desc')->paginate(10);

        // Return collection of stations as a resource
        return StationResource::collection($stations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_station' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'district' => 'required',
            'id_district' => 'required',
            'region' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $station = new Station;

        $station->name = $request->input('name');
        $station->id_station = $request->input('id_station');
        $station->latitude = $request->input('latitude');
        $station->longitude = $request->input('longitude');
        $station->district = $request->input('district');
        $station->id_district = $request->input('id_district');
        $station->region = $request->input('region');

        $station->save();

        return new StationResource($station);
    }

    public function putStation(Request $request, $stationId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id_station' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'district' => 'required',
            'id_district' => 'required',
            'region' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $station = Station::findOrFail($stationId);

        $station->update([
            'name' => $request->input('name'),
            'id_station' => $request->input('id_station'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'district' => $request->input('district'),
            'id_district' => $request->input('id_district'),
            'region' => $request->input('region'),
        ]);
        return new StationResource($station);
    }

    public function deleteStation($id)
    {
        // Get station
        $station = Station::findOrFail($id);
        if (!$station) {
            return response()->json(['message' => 'station not found', 'status' => false], 404);
        }
        if ($station->delete()) {
            return new StationResource($station);
        }
    }

    public function export()
    {
        return Excel::download(new StationsExport, 'stations.xlsx');
    }

    public function import()
    {
        Excel::import(new StationImport, request()->file('file'));

        return back();
    }

    public function importExportView()
    {
       return view('import');
    }
}
