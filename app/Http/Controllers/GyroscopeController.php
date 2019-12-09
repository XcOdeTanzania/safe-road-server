<?php

namespace App\Http\Controllers;


use App\Gyroscope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GyroscopeController extends Controller
{
    public function getGyroscopes()
    {
        // Get gyroscopes
        $gyroscopes = Gyroscope::orderBy('created_at', 'desc')->paginate(10);

         return response()->json(['gyroscopes'=> Gyroscope::all(),'status'=>true], 200, [], JSON_NUMERIC_CHECK);
    }

   public function gyroscopes(){
        $gyroscopes = Gyroscope::all();
        
     return view('gyroscope',['gyroscopes' => $gyroscopes]);
    }
   
    public function postGyroscope(Request $request)
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


        $gyroscope = new Gyroscope;

        $gyroscope->x = $request->input('x');
        $gyroscope->y = $request->input('y');
        $gyroscope->z = $request->input('z');
        $gyroscope->user_id = $request->input('user_id');

        $gyroscope->save();

        return response()->json(['gyroscope'=> $gyroscope, 'status'=>true], 200, [], JSON_NUMERIC_CHECK);
    }

   

    public function deleteGyroscope($id)
    {
        // Get gyroscope
        $gyroscope = Gyroscope::findOrFail($id);
        if (!$gyroscope) {
            return response()->json(['message' => 'gyroscope not found', 'status' => false], 404);
        }
        if ($gyroscope->delete()) {
            return  response()->json(['message'=> 'Gyroscope Deleted successfully', 'status'=>true]);
        }
    }
    
    
   
}
