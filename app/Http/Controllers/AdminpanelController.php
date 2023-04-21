<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Industry;
use App\Models\Province;
use App\Models\Services;
use App\Models\pendingApproval;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class AdminpanelController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function displayAll() 
    {
        $industries = DB::table('industries')
        ->select('industries.industry', 'industries.id')
        ->get();

        $services = DB::table('services')
        ->select('*')
        ->get();

        $businesses = DB::table('businesses')
        ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
        ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
        ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
        ->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry')
        ->get();

        $provinces = DB::table('provinces')
        ->select('*')
        ->get();

        $districts = DB::table('municipal_districts')
        ->select('*')
        ->get();

        $municipalities = DB::table('municipalities')
        ->select('*')
        ->get();

        $towns = DB::table('towns')
        ->select('*')
        ->get();

        $pending_approvals = DB::table('pending_approvals')
        ->join('businesses', 'pending_approvals.who_id', '=', 'businesses.id')
        ->leftjoin('users', 'pending_approvals.uid', '=', 'users.id')
        ->select('pending_approvals.*', 'businesses.business_name','users.name')
        ->get();
        
        return view('adminpanel', ['admintowns' => $towns , 'adminmunicipalities' => $municipalities , 'admindistricts' => $districts , 'adminprovinces' => $provinces ,'adminbusinesses' => $businesses ,'adminindustries' => $industries, 'adminservices' => $services, 'adminpending_approvals'=>$pending_approvals]); 
     }
    
     public function deleteBusinessAdmin($id)
     {

         $data = Business::find($id);
         $data->delete();
         return redirect('adminpanel')->with('status', 'Business deleted!');
         
     }

     public function activatebusiness($id)
     {
         //
         $data = Business::find($id);
         $data->activation_status = 1;
         $data->save();
         return redirect('adminpanel')->with('status', 'Business Activated!');
         
     }

     public function deactivatebusiness($id)
     {
         //
         $data = Business::find($id);
         $data->activation_status = 0;
         $data->save();
         return redirect('adminpanel')->with('status', 'Business Deactivated!');
         
     }

     public function viewbusiness($id)
     {
         //
         $data = Business::find($id);
         $data->view();
         return redirect('viewBusiness');
         
     }


     public function approveindustry($id)
     {
        $pendingApproval = PendingApproval::find($id);

    if ($pendingApproval->approval_status == 0 || $pendingApproval->approval_status == 2) {
        $industry = new Industry();
        $industry->industry = $pendingApproval->the_content;
        $industry->save();

        $pendingApproval->approval_status = 1;
        $pendingApproval->save();

        $pendingApproval->uid = auth()->user()->id;

        $pendingApproval->save();
        return redirect()->back()->with('status', 'Industry APPROVED!');
    } 
        
}
    
    public function declineindustry(Request $request,$id)
{
    $record = DB::table('pending_approvals')->where('id', $id)->where('approval_status', 1)->first();
    if (!$record) {
        return response()->json(['message' => 'Invalid request'], 400);
    }

    DB::table('pending_approvals')->where('id', $id)->update(['approval_status' => 2]);

    return redirect('adminpanel')->with('status', 'Industry Declined!');}
}