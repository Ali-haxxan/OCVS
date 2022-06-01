<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\child;

class ChildController extends Controller
{
    public function ChildCreate(Request $request,$id)
    {
        
        
        
 
        

        $child = new child;
        $child->child_name = $request->name;
        $child->parents_id = $id;
        $child->f_name = $request->fname;
        $child->f_cnic = $request->fcnic;
        $child->m_name = $request->mname;
        $child->m_cnic = $request->mcnic;
        $child->gender = $request->gender;
        $child->dob = $request->date;
        $child->venue = $request->venue;
        $child->city = $request->city;
        $child->address = $request->address;
        $child->number = $request->phone_number;
        $query = $child->save();
    
        if($query){
            return back()->with('success','Successfully Registered!');
        }
        else{
            return back()->with('fail',' Registered Failed!');
        }
        }
}
