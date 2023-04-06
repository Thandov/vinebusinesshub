<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Industry;
use App\Models\Province;
use App\Models\Services;
use App\Models\pendingApprovals;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        ->select('*')
        ->get();
        
        return view('adminpanel', ['admintowns' => $towns , 'adminmunicipalities' => $municipalities , 'admindistricts' => $districts , 'adminprovinces' => $provinces ,'adminbusinesses' => $businesses ,'adminindustries' => $industries, 'adminservices' => $services, 'adminpending_approvals'=>$pending_approvals]); 
     }

     public function deleteBusinessAdmin($id)
     {

         $data = Business::find($id);
         $data->delete();
         return redirect('adminpanel');
         
     }

     public function activatebusiness($id)
     {
         //
         $data = Business::find($id);
         $data->activation_status = 1;
         $data->save();
         return redirect('adminpanel');
         
     }

     public function deactivatebusiness($id)
     {
         //
         $data = Business::find($id);
         $data->activation_status = 0;
         $data->save();
         return redirect('adminpanel');
         
     }

     public function viewbusiness($id)
     {
         //
         $data = Business::find($id);
         $data->view();
         return redirect('viewBusiness');
         
     }

     public function adminpending_approval($id)
     {
         //
         $data = pending_approval::find($id);
         DB::table('industries')->insert($data);
         DB::table('pending_approvals')->where('id', $id)->delete();
        return redirect('adminpanel');

     }
     
  
}