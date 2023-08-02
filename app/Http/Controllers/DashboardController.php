<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function displayBusinesses()
    {
        $business = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry')
            ->paginate(12); // limit to 10 results per page

        $industry = DB::table('industries')
            ->select('industries.industry')
            ->orderBy('id', 'desc')
            ->get();

        $provinces = DB::table('provinces')
            ->select('provinces.id', 'provinces.province')
            ->get();

        $municipal_districts = DB::table('municipal_districts')
            ->leftjoin('provinces', 'provinces.id', '=', 'municipal_districts.provinceId')
            ->select('municipal_districts.municipal_district', 'provinces.province', 'provinces.id')
            ->get();

        $municipalities = DB::table('municipalities')
            ->leftjoin('municipal_districts', 'municipal_districts.id', '=', 'municipalities.districtId')
            ->select('municipalities.municipality', 'municipal_districts.municipal_district', 'municipal_districts.id')
            ->get();

        return view('home', compact('business', 'industry', 'provinces', 'municipal_districts'));
    }
    public function index()
    {
        if (Auth::user()->hasRole('business')) {

            return redirect('business/businessdashboard/' . Auth::user()->id);
        } elseif (Auth::user()->hasRole('user')) {
            return view('profile/userboard');
        } elseif (Auth::user()->hasRole('admin')) {

            return redirect('adminpanel');
        }
    }
    public function businessprofile(Request $request)
    {
        return view('businessprofileview');
    }
    public function action(Request $request)
    {
        $output = '';
        $query = $request->get('query');
        $searchOption = $request->get('searchOption');
        $selectedDistrict = $request->get('selectedDistrict');
        $numOfCols = 3;
        $bootstrapColWidth = 12 / $numOfCols;
        $business = [];
    
        if ($query != '') {
            if ($searchOption === "businessNameSearch") {
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry')
                    ->where('business_name', 'LIKE', $query . '%')
                    ->paginate(12) // limit to 10 results per page
                    ->withQueryString(); // add this line to include other query parameters in the pagination link
    
            } elseif ($searchOption === "provinceSearch") {
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province')
                    ->where('province', 'LIKE', $query . '%')
                    ->paginate(12) // limit to 10 results per page
                    ->withQueryString(); // add this line to include other query parameters in the pagination link
    
            } elseif ($searchOption === "districtSearch") {
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province', 'municipal_districts.municipal_district')
                    ->where('municipal_district', 'LIKE', $query . '%')
                    ->paginate(12)
                    ->withQueryString();
            } elseif ($searchOption === "municipalitySearch") {
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->join('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province', 'municipalities.municipality')
                    ->where('municipality', 'LIKE', $query . '%')
                    ->paginate(12)
                    ->withQueryString();
            } elseif ($searchOption === "industrySearch") {
                if (!empty($selectedDistrict)) {
                    $business = DB::table('businesses')
                        ->join('industries', 'industries.id', '=', 'businesses.industryId')
                        ->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
                        ->leftJoin('provinces', function ($join) {
                            $join->on('provinces.id', '=', 'businesses.provinceId')
                                ->orOn('provinces.id', '=', 'businesses.districtId');
                        })
                        ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province', 'municipal_districts.municipal_district')
                        ->where('industry', 'LIKE', $query . '%')
                        ->where('provinces.province', '=', $request->selectedProvince)
                        ->where('municipal_districts.municipal_district', '=', $request->selectedDistrict)
                        ->paginate(12) // limit to 10 results per page
                        ->withQueryString();
                } else {
                    $business = DB::table('businesses')
                        ->join('industries', 'industries.id', '=', 'businesses.industryId')
                        ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry')
                        ->where('industry', 'LIKE', $query . '%')
                        ->paginate(12) // limit to 10 results per page
                        ->withQueryString(); // add this line to include other query parameters in the pagination link
    
                }
            }
        } else {
            $business = DB::table('businesses')
                ->join('industries', 'industries.id', '=', 'businesses.industryId')
                ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry')
                ->paginate(12) // limit to 10 results per page
                ->withQueryString(); // add this line to include other query parameters in the pagination link
        }
    
        if ($business->isEmpty()) {
            $output = '<p>No results found.</p>'; 
        } else {
            foreach ($business as $row) {
            
            }
        }
    
        $html = view('home._businesses', ['business' => $business])->render();
        $pagination = $business->links()->render();
    
        if ($request->isXmlHttpRequest()) {
            return response()->json(['html' => $html, 'pagination' => $pagination, 'message' => $output]);
        }
    
        return view('home', compact('business', 'bootstrapColWidth'));
    }
    

    public function changeDistrict(Request $request)
    {

        $municipal_districts = DB::table('municipal_districts')
            ->leftjoin('provinces', 'provinces.id', '=', 'municipal_districts.provinceId')
            ->where('municipal_districts.provinceId', $request->id)
            ->select('municipal_districts.municipal_district', 'provinces.province', 'municipal_districts.id')
            ->get();

        return $municipal_districts;
    }
    public function changeMunicipality(Request $request)
    {

        $municipalities = DB::table('municipalities')
            ->leftjoin('municipal_districts', 'municipal_districts.id', '=', 'municipalities.districtId')
            ->where('municipalities.districtId', $request->id)
            ->select('municipalities.municipality', 'municipal_districts.municipal_district', 'municipalities.id')
            ->get();

        return $municipalities;
    }
}