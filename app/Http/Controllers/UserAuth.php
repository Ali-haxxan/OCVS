<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\child;
use App\Models\staff;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuth extends Controller
{
    function login(){
        return view('User.Auth.login');
    }
    function register(){
        return view('User.Auth.register');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
            
        ]);
    
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();
    
        if($query){
            return back()->with('success','Successfully Registered!');
        }
        else{
            return back()->with('fail',' Registered Failed!');
        }
        }
    
        public function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $User = User::where('email','=',$request->email)->first();
        if($User){
            if(Hash::check($request->password, $User->password)){
                $request->session()->put('Loggeduser',$User->id);
                return redirect('register-baby');
            }
            else{
                return back()->with('fail','Invalid Password!');
            }
        }
        else{
            return back()->with('fail','Account Not Found!'); 
        }
        if(!$User){
            return back()->with('fail','Database Connection Problem!');
        }
        }
        public function home()
    {
        if(session()->has('Loggeduser')){
            $User  = User::where('id','=',session('Loggeduser'))->first();
            $session = session('Loggeduser');
            $users = DB::table('children')->where('children.parents_id','=',$session)->get();
            
            $data = [
                'children'=>$users,
                'LoggeduserInfo'=>$User
            ];
           
        }
        return view('User.User',$data);
    }
    public function logout()
    {
        if(session()->has('Loggeduser')){
            session()->pull('Loggeduser');
        }
        return redirect('/');       
    }

    public function RegisteredBabies()  
    {
        if(session()->has('Loggeduser')){
            $User  = User::where('id','=',session('Loggeduser'))->first();
            $childs = child::where('parents_id','=',session('Loggeduser'))->get();
            $session = session('Loggeduser');
            $users = DB::table('children')->where('children.parents_id','=',$session)->get();
            
            $data = [
                'children'=>$users,
                'ChildsInfo'=>$childs,
                'LoggeduserInfo'=>$User
            ];
           
        }
        // dd($data);
        return view('User.Registered-babies',$data);
    }
    public function fetchChild()
    {
        if(session()->has('Loggeduser')){
        $User  = User::where('id','=',session('Loggeduser'))->first();
        $childs = child::where('parents_id','=',session('Loggeduser'))->get();
        
        return response()->json([
            'child'=>$childs
        ]);
        }
    }   

    public function editRegisteredchild($id)  
    {
        if(session()->has('Loggeduser')){
            $User  = User::find($id);
            $childs = child::where('id','=',$id)->first();
            if($childs)
        {
            return response()->json([
                'status'=>200,
                'child'=>$childs
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Child Not Found',
            ]);
        }
           
        }
    }

    public function Childupdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'gender'=> 'required',
            'fname'=> 'required',
            'fcnic'=> 'required', 
            'mname'=> 'required', 
            'mcnic'=> 'required', 
            'date'=> 'required', 
            'venu'=> 'required', 
            'city'=> 'required', 
            'address'=> 'required', 
            'number'=> 'required', 
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
            
            $bdd = $request->input('date');
            $date = Carbon::parse($bdd);
            $childs = child::find($id);

            if($childs)
            {
                $childs->child_name = $request->input('name');
                $childs->gender = $request->input('gender');
                $childs->f_name = $request->input('fname');
                $childs->f_cnic = $request->input('fcnic');
                $childs->m_name = $request->input('mname');
                $childs->m_cnic = $request->input('mcnic');
                $childs->dob = $date ;
                $venue= $request->input('venu');
                if($venue = 'Center'){
                    $childs->staff_id=Null;
                }

                if($venue = 'Home'){
                    $childs->center_id=Null;
                }
                $childs->venue = $request->input('venu');
                $childs->city = $request->input('city');
                $childs->address = $request->input('address');
                $childs->number = $request->input('number');
                $childs->update();
                return response()->json([
                'status'=>200,
                'message'=>'Child Updated Successfully.'
            ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Child Not Found',
                ]);
            }

            
        }
    }
    public function deleteRegisteredchild($id)
    {
        $childs = child::find($id);
        $childs->delete();

        if ($childs) {
            return response()->json([
                'status'=>200,
                'message'=>'Child Deleted Successfully',
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message'=>'Child Not Found',
            ]);
        }
        
        
    }
    public function VaccinationVanue()
    {
        if(session()->has('Loggeduser')){

            // $time='2021-5-1';
            // dd(now()->diffinDays($time));
            // dd($time);

            $User  = User::where('id','=',session('Loggeduser'))->first();
            $session = session('Loggeduser');

            $hchild= child::select('venue')->where('parents_id','=',$session)->where('venue','=','Home')->first();
            
            $cchild= child::select('venue')->where('parents_id','=',$session)->where('venue','=','Center')->first();
            
            $users = DB::table('children')->join('users', 'children.parents_id', '=', 'users.id' )->join('staff', 'children.staff_id', '=', 'staff.id' )->where('children.parents_id','=',$session)->get();
            $users1 = DB::table('children')->join('users', 'children.parents_id', '=', 'users.id' )->join('centers', 'children.center_id', '=', 'centers.id' )->where('children.parents_id','=',$session)->get();
            $session = session('Loggeduser');
            $users2 = DB::table('children')->where('children.parents_id','=',$session)->get();
            
            

            
            $data = [
                'homeChild'=>$hchild,
                'centerChild'=>$cchild,
                'children'=>$users2,
                'hchildren'=>$users,
                'Cchildren'=>$users1,
                'LoggeduserInfo'=>$User
            ];
           
        }
        return view('User.Vaccination-vanue',$data);
    }

    public function VaccinationDate()
    {
        if(session()->has('Loggeduser')){

            $session = session('Loggeduser');

            $vacciness=DB::table('children')->where('parents_id','=',$session)->Leftjoin('children_vaccines', 'children.id', '=', 'children_vaccines.children_id' )->Leftjoin('vaccines','vaccines.id', '=', 'children_vaccines.vaccines_id')->get();

            $vaccines=DB::table('vaccines')->get();
            $childVacc = DB::table('children_vaccines')->get();
            $User  = User::where('id','=',session('Loggeduser'))->first();
            $session = session('Loggeduser');
            $users = DB::table('children')->where('children.parents_id','=',$session)->get();
            

            $data = [
                'vaccines'=>$vaccines,
                'test'=>$vacciness,
                'children'=>$users,
                'childVacc'=>$childVacc,
                'childs'=>$users,
                'LoggeduserInfo'=>$User
            ];
           dd($data);
        }
        return view('User.Vaccination-date',$data);
    }

    public function Feedback() 
    {
        if(session()->has('Loggeduser')){

            
            $session = session('Loggeduser');
            $users = DB::table('children')->where('children.parents_id','=',$session)->get();
            $User  = User::where('id','=',session('Loggeduser'))->first();
            
            $data = [
                'LoggeduserInfo'=>$User,
                'children'=>$users,
            ];
           
        }
        return view('User.Feedback',$data);
    }

    public function UserFeedback(Request $request, $id)  
    {
        if(session()->has('Loggeduser')){
            $User  = User::where('id','=',session('Loggeduser'))->first();
            
            $feedback = new feedback;
            $feedback->user_id = $id;
            $feedback->user_name = $User->name;
            $feedback->feedback = $request->feedback;
            $feedback->save();

           
        }
        return redirect('/feedback');
    }

    public function GetCertificate()
    {
        if(session()->has('Loggeduser')){
            $User  = User::where('id','=',session('Loggeduser'))->first();
            $childs = child::where('parents_id','=',session('Loggeduser'))->get();
            $data = [
                'children'=>$childs,
                'ChildsInfo'=>$childs,
                'LoggeduserInfo'=>$User
            ];
        //    dd($data);
        }
        return view('User.Get-Certificate',$data);
    }
    public function fetchcertificate($id)
    {
        $certificateData = DB::table('children')->where('children.id','=',$id)->join('children_vaccines','children.id','=','children_vaccines.children_id')->Join('vaccines','children_vaccines.vaccines_id','=','vaccines.id')->orderBy('vaccines.id', 'ASC')->get();
        $childrenData = DB::table('children')->where('children.id','=',$id)->get();
        $data = [
            'certificateinfo'=>$certificateData,
            'childinfo'=>$childrenData,
        ];
    //  dd($id);

     return view('User.certificate',$data);
    }
}
