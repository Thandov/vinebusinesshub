<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Industry;
use App\Models\PendingApproval; // Add this line at the top of your file
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->paginate(3, ['*'], 'industries') // limit to 10 results per page
            ->withQueryString(); // add this line to include other query parameters in the pagination link

        $services = DB::table('services')
            ->select('*')
            ->get();

        $businesses = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry')
            ->paginate(10, ['*'], 'businesses')
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
            ->paginate(8, ['*'], 'pending_approvals')
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

    public function approveindustry(Request $request)
    {
        $string_with_numbers_and_characters = $request->approvalId;
        $numbers_only = (int) preg_replace("/[^0-9]/", "", $string_with_numbers_and_characters);

        if ($request->ajax()) {
            $pendingApproval = PendingApproval::findOrFail($numbers_only);

            if ($pendingApproval->approval_status === 'Declined' || $pendingApproval->approval_status === 'pending' || $pendingApproval->approval_status === '2') {
                $industry = Industry::where('industry', $pendingApproval->the_content)->first();

                if (!$industry) {
                    $industry = new Industry();
                    $industry->industry = $pendingApproval->the_content;
                    $industry->save();
                }

                // Update the related business form with the new industry ID
                $business = Business::where('company_rep', $pendingApproval->who_id)->first();
                if ($business) {
                    $business->industryId = $industry->id;
                    $business->save();
                } else {
                    return response()->json(['message' => 'Business record not found'], 404);
                }
                $pendingApproval->approval_status = 'Approved';
                $pendingApproval->uid = auth()->user()->id;
                $pendingApproval->save();
                return response()->json(['approval_status' => true]);
            } elseif ($pendingApproval->approval_status === 'Approved' || $pendingApproval->approval_status === '1') {
                $pendingApproval->approval_status = "Declined";
                $pendingApproval->uid = auth()->user()->id;
                $pendingApproval->save();
                // Update the related business form with the new industry ID
                $business = Business::where('company_rep', $pendingApproval->who_id)->first();
                if ($business) {
                    $business->industryId = 1;
                    $business->save();
                } else {
                    return response()->json(['message' => 'Business record not found'], 404);
                }

                return response()->json(['approval_status' => false]);
            }
        }

        $pendingApproval = PendingApproval::findOrFail($request->approvalId);

        if ($pendingApproval->approval_status === 0 || $pendingApproval->approval_status === 2) {
            $industry = Industry::where('industry', $pendingApproval->the_content)->first();

            if (!$industry) {
                $industry = new Industry();
                $industry->industry = $pendingApproval->the_content;
                $industry->save();
            }

            $pendingApproval->approval_status = 1;
            $pendingApproval->uid = auth()->user()->id;
            $pendingApproval->save();

            return redirect()->back()->with('status', 'Industry APPROVED!');
        } else {
            $pendingApproval->approval_status = 2;
            $pendingApproval->uid = auth()->user()->id;
            $pendingApproval->save();

            return redirect()->back()->with('status', 'This is set to 1');
        }
    }

}