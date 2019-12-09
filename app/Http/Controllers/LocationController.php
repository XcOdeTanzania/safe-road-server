<?php

namespace App\Http\Controllers;


use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function getLocations()
    {
        // Get locations
        $locations = Location::orderBy('created_at', 'desc')->paginate(10);

         return response()->json(['locations'=> Location::all(),'status'=>true], 200, [], JSON_NUMERIC_CHECK);
    }
    
    public function locations(){
        $locations = Location::all();
        
     return view('location',['locations' => $locations]);
    }
   

   
    public function postLocation(Request $request)
    {
          
       
        $validator = Validator::make($request->all(), [
            'x' => 'required',
            'y' => 'required',
            'z' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }


        $location = new Location;

        $location->x = $request->input('x');
        $location->y = $request->input('y');
        $location->z = $request->input('z');
        $location->user_id = $request->input('user_id');

        $location->save();

        return response()->json(['location'=> $location, 'status'=>true], 200, [], JSON_NUMERIC_CHECK);
    }

   

    public function deleteLocation($id)
    {
        // Get location
        $location = Location::findOrFail($id);
        if (!$location) {
            return response()->json(['message' => 'location not found', 'status' => false], 404);
        }
        if ($location->delete()) {
            return  response()->json(['message'=> 'Location Deleted successfully', 'status'=>true]);
        }
    }
    
    
   
}
