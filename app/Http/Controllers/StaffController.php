<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'cnic'=>'required|max:15|min:13',
            'number'=>'required|max:12|min:11',
            'city'=>'required',
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
           
            $staff = new staff;
            $staff->staff_name = $request->input('name');
            $staff->staff_cnic = $request->input('cnic');
            $staff->staff_ph_number = $request->input('number');
            $staff->staff_city = $request->input('city');
            $staff->save();
            return response()->json([
                'status'=>200,
                'message'=>'Staff Added Successfully.'
            ]);
        }
    }

    public function fetch()
    {
        $staff = staff::all();
        return response()->json([
            'staff'=>$staff
        ]);
    }
    public function edit($id)
    {
        $staff = staff::find($id);
        
        if($staff)
        {
            return response()->json([
                'status'=>200,
                'staff'=>$staff
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Staff Not Found',
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            
            'name'=> 'required',
            'cnic'=>'required|max:15|min:13',
            'number'=>'required|max:12|min:11',
            'city'=>'required',
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
            
            $staff = staff::find($id);
            if($staff)
            {
                $staff->staff_name= $request->input('name');
                $staff->staff_cnic= $request->input('cnic');
                $staff->staff_ph_number = $request->input('number');
                $staff->staff_city = $request->input('city');
                $staff->update();
                return response()->json([
                'status'=>200,
                'message'=>'Staff Updated Successfully.'
            ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Staff Not Found',
                ]);
            }

            
        }
    }

    public function delete($id)
    {
        $staff = staff::find($id);
        $staff->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Staff Deleted Successfully',
        ]);

    }

}
