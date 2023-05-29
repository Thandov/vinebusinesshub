<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\pendingApproval;
use App\Models\Industry;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
            ->leftjoin('businesses', 'businesses.company_rep', '=', 'pending_approvals.who_id')
            ->leftjoin('users', 'users.id', '=', 'pending_approvals.uid')
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

            $business = Business::find($pendingApproval->who_id);

            return redirect()->back()->with('status', 'Industry APPROVED!');
        }

    }

    public function declineindustry(Request $request, $id)
    {
        $record = PendingApproval::where('id', $id)->whereIn('approval_status', [0, 1])->first();

        if (!$record) {
            return response()->json(['message' => 'Invalid request'], 400);
        }

        $industry = Industry::where('industry', $record->the_content)->first();
        if ($industry) {
            $industry->delete();
        }

        $record->approval_status = 2;
        $record->save();

        return redirect()->back()->with('status', 'Industry Declined!');
    }
}
