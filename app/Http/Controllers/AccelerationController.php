<?php

namespace App\Http\Controllers;


use App\Acceleration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccelerationController extends Controller
{
    public function getAccelerations()
    {
        // Get accelerations
        $accelerations = Acceleration::orderBy('created_at', 'desc')->paginate(10);

         return response()->json(['accelerations'=> Acceleration::all(),'status'=>true], 200, [], JSON_NUMERIC_CHECK);
    }
    
    public function accelerations(){
        $accelerations = Acceleration::all();
        //($accelerations);
   
     return view('acceleration',['accelerations' => $accelerations]);
    }

   
    public function postAcceleration(Request $request)
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


        $acceleration = new Acceleration;

        $acceleration->x = $request->input('x');
        $acceleration->y = $request->input('y');
        $acceleration->z = $request->input('z');
        $acceleration->user_id = $request->input('user_id');

        $acceleration->save();

        return response()->json(['acceleration'=> $acceleration, 'status'=>true], 200, [], JSON_NUMERIC_CHECK);
    }

   

    public function deleteAcceleration($id)
    {
        // Get acceleration
        $acceleration = Acceleration::findOrFail($id);
        if (!$acceleration) {
            return response()->json(['message' => 'acceleration not found', 'status' => false], 404);
        }
        if ($acceleration->delete()) {
            return  response()->json(['message'=> 'Acceleration Deleted successfully', 'status'=>true]);
        }
    }
    
    
   
}
