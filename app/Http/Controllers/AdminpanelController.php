<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Industry;
use App\Models\Province;
use App\Models\Services;
use Illuminate\Support\Facades\DB;
use App\Models\pendingApproval;

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
            ->paginate(3) // limit to 10 results per page
            ->withQueryString(); // add this line to include other query parameters in the pagination link

        $services = DB::table('services')
            ->select('*')
            ->get();

        $businesses = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry')
            ->paginate(10) 
            ->withQueryString(); 

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
            ->select('pending_approvals.*', 'businesses.business_name', 'users.name')
            ->paginate(10) 
            ->withQueryString(); 

            return view('adminpanel', ['admintowns' => $towns, 'adminmunicipalities' => $municipalities, 'admindistricts' => $districts, 'adminprovinces' => $provinces, 'adminbusinesses' => $businesses, 'adminindustries' => $industries, 'adminservices' => $services, 'adminpending_approvals' => $pending_approvals]);
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

    public function item($id)
    {
        $item = Business::find($id);
        $item->view();
    }
}
