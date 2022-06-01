<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CenterController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            
            
            'name'=> 'required',
            'city'=>'required',
            'tehsil'=>'required',
            'number'=>'required|max:12|min:11',
            'timing'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
                     
            $center = new Center;
            $center->center_name = $request->input('name');
            $center->center_city = $request->input('city');
            $center->center_tehsil = $request->input('tehsil');
            $center->center_ph_number = $request->input('number');
            $center->center_timing = $request->input('timing');
            $center->save();
            return response()->json([
                'status'=>200,
                'message'=>'Center Added Successfully.'
            ]);
        }
    }

    public function fetch()
    {
        $center = Center::all();
        return response()->json([
            'center'=>$center
        ]);
    }

    public function edit($id)
    {
        $center = Center::find($id);
        if($center)
        {
            return response()->json([
                'status'=>200,
                'center'=>$center
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Center Not Found',
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'city'=>'required',
            'tehsil'=>'required',
            'number'=>'required|max:12|min:11',
            'timing'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $center = Center::find($id);

            if($center)
            {   
                $center->center_name = $request->input('name');
                $center->center_city = $request->input('city');
                $center->center_tehsil = $request->input('tehsil');
                $center->center_ph_number = $request->input('number');
                $center->center_timing = $request->input('timing');
                $center->update();
                return response()->json([
                'status'=>200,
                'message'=>'Center Updated Successfully.'
            ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Center Not Found',
                ]);
            }

            
        }
    }

    public function delete($id)
    {
        $center = Center::find($id);
        $center->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Center Deleted Successfully',
        ]);

    }
}
