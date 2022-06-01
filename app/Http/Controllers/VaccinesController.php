<?php

namespace App\Http\Controllers;

use App\Models\Vaccines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VaccinesController extends Controller
{
    public function fetch()
    {
        $vaccine = Vaccines::orderByRaw('LENGTH(vaccination_time) ASC')->orderBy('vaccination_time', 'ASC')->get();
        return response()->json([
            'vaccine'=>$vaccine
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            
            
            'name'=> 'required',
            'type'=>'required',
            'diseases_prevent'=>'required',
            'causes'=>'required',
            'time_type'=>'required',
            'vaccination_time'=>'required',
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
            $vaccine = new Vaccines;
            $vaccine->vac_name = $request->input('name');
            $vaccine->vac_type = $request->input('type');
            $vaccine->diseases_prevent = $request->input('diseases_prevent');
            $vaccine->vac_causes = $request->input('causes');
            $vaccine->time_in = $request->input('time_type');
            $vaccine->vaccination_time = $request->input('vaccination_time');
            $vaccine->save();
            return response()->json([
                'status'=>200,
                'message'=>'Vaccine Added Successfully.'
            ]);
        }
    }
    public function edit($id)
    {
        $vaccine = Vaccines::find($id);
        if($vaccine)
        {
            return response()->json([
                'status'=>200,
                'vaccine'=>$vaccine
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Vaccine Not Found',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'type'=>'required',
            'diseases_prevent'=>'required',
            'causes'=>'required',
            'time_in'=>'required',
            'vaccination_time'=>'required',
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
            $vaccine = Vaccines::find($id);

            if($vaccine)
            {
                $vaccine->vac_name = $request->input('name');
                $vaccine->vac_type = $request->input('type');
                $vaccine->diseases_prevent = $request->input('diseases_prevent');
                $vaccine->vac_causes = $request->input('causes');
                $vaccine->time_in = $request->input('time_in');
                $vaccine->vaccination_time = $request->input('vaccination_time');
                $vaccine->update();
                return response()->json([
                'status'=>200,
                'message'=>'Vaccine Updated Successfully.'
            ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'vaccine Not Found',
                ]);
            }

            
        }
    }

    public function delete($id)
    {
        $vaccine = Vaccines::find($id);
        $vaccine->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Vaccine Deleted Successfully',
        ]);

    }
}
