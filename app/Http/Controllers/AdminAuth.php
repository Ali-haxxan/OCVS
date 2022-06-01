<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\city;
use App\Models\User;
use App\Models\Admin;
use App\Models\child;
use App\Models\staff;   
use App\Models\children_vaccines;
use App\Models\Center;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuth extends Controller
{
    function login(){
        return view('Admin.Auth.login');
    }

    function register(){
        return view('Admin.Auth.register');
    }

    public function create(Request $request)
    {
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:admins',
        'password'=>'required|min:5|max:12'
    ]);

    $Admin = new Admin;
    $Admin->name = $request->name;
    $Admin->email = $request->email;
    $Admin->password = Hash::make($request->password);
    $query = $Admin->save();

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
    $Admin = Admin::where('email','=',$request->email)->first();
    if($Admin){
        if(Hash::check($request->password, $Admin->password)){
            $request->session()->put('Loggedadmin',$Admin->id);



            if(session()->has('Loggedadmin')){
                $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
                $data = [
                    'LoggedadminInfo'=>$Admin
                ];
                
            }
            
        

            return redirect('admin/medical-staff');
        }
        else{
            return back()->with('fail','Invalid Password!');
        }
    }
    else{
        return back()->with('fail','Account Not Found!'); 
    }
    if(!$Admin){
        return back()->with('fail','Database Connection Problem!');
    }

    }

        //  Passing the login perameter to the navbar 
    public function home()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.Admin',$data);
    }
    
    public function logout()
    {
        if(session()->has('Loggedadmin')){
            session()->pull('Loggedadmin');
        }
        return redirect('/admin');
    }

    public function centers()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            
            $data = [
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.Centers',$data);
    }

    public function vaccines()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.Vaccines',$data);
    }

    public function HomeRequests()
    {
        if(session()->has('Loggedadmin')){  
            $staff = staff::all();
            $childs = child::where('venue','=','Home')->where('staff_id','=',null)->get();
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'medicalstaff'=>$staff, 
                'children'=>$childs,
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.home-requests',$data);
    }   

    public function proceded(Request $request, $id)
    {
        
            $childs = child::find($id);
            $childs->center_id = $request->center;
            $childs->update();
            return redirect('/admin/center-requests');        
    }
     
    public function staffproceded(Request $request, $id)
    {

            $childs = child::find($id);
            $childs->staff_id = $request->staff;
            $childs->update();
            return redirect('/admin/home-requests');        
    }
    

    public function CenterRequests()
    {
        if(session()->has('Loggedadmin')){
            $center = Center::all();
            $childs = child::where('venue','=','Center')->where('center_id','=',null)->get();
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'healthcenter'=>$center,
                'children'=>$childs,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.center-requests',$data);
    }

    public function AtBirth()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();

            $vaccines=DB::table('vaccines')->where('vaccination_time','=', '1')->get();
            $childVacc = DB::table('children_vaccines')->get();
            $childrens = DB::table('children')->get();

            
            $data = [
                'Vaccines'=>$vaccines,
                'childVacc'=>$childVacc,
                'children'=>$childrens,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.1-visit',$data);
    }
    public function vaccinated1(Request $request, $id )
    {   
        
        $childVacc = new children_vaccines;
        $childVacc->children_id = $id;
        $childVacc->vaccines_id = $request->input('vaccId');
        $childVacc->save();
        return redirect('/admin/at-birth');
    }
    public function unvaccinated1(Request $request, $id )
    {   
        // $delchildVacc= $request->input('vaccId');
        $childVacc = children_vaccines::find($id);
        $childVacc->delete();
        return redirect('/admin/at-birth');
    }

    public function SixWeek()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();

            $vaccines=DB::table('vaccines')->where('vaccination_time','=', '42')->get();
            $childVacc = DB::table('children_vaccines')->get();
            $childrens = DB::table('children')->get();

            
            $data = [
                'Vaccines'=>$vaccines,
                'childVacc'=>$childVacc,
                'children'=>$childrens,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.2-visit',$data);
    }
    public function vaccinated2(Request $request, $id )
    {   
        
        $childVacc = new children_vaccines;
        $childVacc->children_id = $id;
        $childVacc->vaccines_id = $request->input('vaccId');
        $childVacc->save();
        return redirect('/admin/6th-week');
    }
    public function unvaccinated2(Request $request, $id )
    {   
        // $delchildVacc= $request->input('vaccId');
        $childVacc = children_vaccines::find($id);
        $childVacc->delete();
        return redirect('/admin/6th-week');
    }

    public function TenWeek()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();

            $vaccines=DB::table('vaccines')->where('vaccination_time','=', '70')->get();
            $childVacc = DB::table('children_vaccines')->get();
            $childrens = DB::table('children')->get();

            
            $data = [
                'Vaccines'=>$vaccines,
                'childVacc'=>$childVacc,
                'children'=>$childrens,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.3-visit',$data);
    }
    public function vaccinated3(Request $request, $id )
    {   
        
        $childVacc = new children_vaccines;
        $childVacc->children_id = $id;
        $childVacc->vaccines_id = $request->input('vaccId');
        $childVacc->save();
        return redirect('/admin/10th-week');
    }
    public function unvaccinated3(Request $request, $id )
    {   
        // $delchildVacc= $request->input('vaccId');
        $childVacc = children_vaccines::find($id);
        $childVacc->delete();
        return redirect('/admin/10th-week');
    }

    public function FourtheenWeek()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();

            $vaccines=DB::table('vaccines')->where('vaccination_time','=', '98')->get();
            $childVacc = DB::table('children_vaccines')->get();
            $childrens = DB::table('children')->get();

            
            $data = [
                'Vaccines'=>$vaccines,
                'childVacc'=>$childVacc,
                'children'=>$childrens,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.4-visit',$data);
    }
    public function vaccinated4(Request $request, $id )
    {   
        
        $childVacc = new children_vaccines;
        $childVacc->children_id = $id;
        $childVacc->vaccines_id = $request->input('vaccId');
        $childVacc->save();
        return redirect('/admin/14th-week');
    }
    public function unvaccinated4(Request $request, $id )
    {   
        // $delchildVacc= $request->input('vaccId');
        $childVacc = children_vaccines::find($id);
        $childVacc->delete();
        return redirect('/admin/14th-week');
    }

    public function NineMonth()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();

            $vaccines=DB::table('vaccines')->where('vaccination_time','=', '270')->get();
            $childVacc = DB::table('children_vaccines')->get();
            $childrens = DB::table('children')->get();

            
            $data = [
                'Vaccines'=>$vaccines,
                'childVacc'=>$childVacc,
                'children'=>$childrens,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.5-visit',$data);
    }
    public function vaccinated5(Request $request, $id )
    {   
        
        $childVacc = new children_vaccines;
        $childVacc->children_id = $id;
        $childVacc->vaccines_id = $request->input('vaccId');
        $childVacc->save();
        return redirect('/admin/9th-month');
    }
    public function unvaccinated5(Request $request, $id )
    {   
        // $delchildVacc= $request->input('vaccId');
        $childVacc = children_vaccines::find($id);
        $childVacc->delete();
        return redirect('/admin/9th-month');
    }
    public function FifteenMonth()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();

            $vaccines=DB::table('vaccines')->where('vaccination_time','=', '450')->get();
            $childVacc = DB::table('children_vaccines')->get();
            $childrens = DB::table('children')->get();

            
            $data = [
                'Vaccines'=>$vaccines,
                'childVacc'=>$childVacc,
                'children'=>$childrens,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.6-visit',$data);
    }
    public function vaccinated6(Request $request, $id )
    {   
        
        $childVacc = new children_vaccines;
        $childVacc->children_id = $id;
        $childVacc->vaccines_id = $request->input('vaccId');
        $childVacc->save();
        return redirect('/admin/15th-month');
    }
    public function unvaccinated6(Request $request, $id )
    {   
        // $delchildVacc= $request->input('vaccId');
        $childVacc = children_vaccines::find($id);
        $childVacc->delete();
        return redirect('/admin/15th-month');
    }
    
    
    public function HomeChilds()
    {

        if(session()->has('Loggedadmin')){

            // $users = DB::table('children')->join('users', 'children.parents_id', '=', 'users.id' )->join('staff', 'children.staff_id', '=', 'staff.id' )->where('children.parents_id','=',$session)->get();
            
            $childs = DB::table('children')->where('venue','=','Home')->where('staff_id','!=',null)->join('staff','children.staff_id', '=', 'staff.id')->get();
            // dd($childs);
            // $childs = child::where('venue','=','Home')->where('staff_id','!=',null)->get();
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'Childsstaff'=>$childs,
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.home-child',$data);
    }
    public function CenterChilds()
    {

        if(session()->has('Loggedadmin')){
            
            $childs = DB::table('children')->where('venue','=','Center')->where('center_id','!=',null)->join('centers','children.center_id', '=', 'centers.id')->get();
            // dd($childs);

            // $childs = child::where('venue','=','Center')->where('center_id','!=',null)->get();
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'Childscenter'=>$childs,
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.center-child',$data);
    }

    public function AtBirthNotification()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            
            $vaccines=DB::table('vaccines')->where('vaccination_time','=', '1')->first();
            $childrens = DB::table('children')->get();
            
            $data = [
                'Vaccines'=>$vaccines,
                'children'=>$childrens,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.notification',$data);
    }

    public function feedback()
    {
        
        if(session()->has('Loggedadmin')){
            $feedbacks = feedback::all();
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'Feedback'=>$feedbacks,
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.user-feedback',$data);
    }

    public function GenerateCertificates()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.Generate-Certificates',$data);
    }

    public function GeneratedCertificates()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
            $data = [
                'LoggedadminInfo'=>$Admin
            ];
        }
        return view('Admin.Generated-Certificates',$data);
    }

    public function GenerateReports()
    {
        if(session()->has('Loggedadmin')){
            $Admin  = Admin::where('id','=',session('Loggedadmin'))->first();
             
        


            $currentmonth_count = child::select(DB::raw("(COUNT(*)) as count"),DB::raw('max(created_at) as createdAt'),DB::raw("MONTHNAME(created_at) as monthname"))->orderBy('MONTHNAME', 'ASC')
             ->whereYear('created_at', date('Y'))
             ->groupBy('monthname')
             ->orderBy('createdAt', 'ASC')
             ->get();
            $yearwise_count = child::select(DB::raw("(COUNT(*)) as count"),DB::raw("YEAR(created_at) as year"))
            ->groupBy('year')
            ->get();

           
            // month counts

            $month = "";
 
             foreach($currentmonth_count as $row) {
                $month.="['".$row->monthname."',".$row->count."]," ;
              }
        

            // year counts

            $years = "";
            foreach($yearwise_count as $row) {
                $years.="['".$row->year."',".$row->count."]," ;
             }
        

           ////
            $data = [
                'currentmonth_count'=>$month,
                'yearwise_count'=>$years,
                'LoggedadminInfo'=>$Admin
            ];
            // dd($data);
        }
        return view('Admin.Reports',$data);
    }

    
    
}
