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

            return redirect('/business/registration');
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
        $descriptionQuery = $request->get('descriptionQuery');
        $locationQuery = $request->get('locationQuery');
        $searchOption = $request->get('searchOption');
        $numOfCols = 3;
        $bootstrapColWidth = 12 / $numOfCols;
        $business = [];

        if (($descriptionQuery || $locationQuery) && $searchOption === "combinedSearch") {
            $business = DB::table('businesses')
                ->join('industries', 'industries.id', '=', 'businesses.industryId')
                ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province')
                ->where(function ($query) use ($descriptionQuery, $locationQuery) {
                    if ($descriptionQuery) {
                        $query->where(function ($innerQuery) use ($descriptionQuery) {
                            $innerQuery->where('business_name', 'LIKE', $descriptionQuery . '%')
                                ->orWhere('industry', 'LIKE', $descriptionQuery . '%');
                        });
                    }
                    if ($locationQuery) {
                        $query->where('province', 'LIKE', $locationQuery . '%');
                    }
                })
                ->paginate(12)
                ->withQueryString();

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

    public function changeIndustry(Request $request)
    {

        return response()->json(['id' => $request->id]);


        $industries = DB::table('industries')
            ->leftjoin('provinces', 'provinces.id', '=', 'industries.provinceId')
            ->where('industries.provinceId', $request->id)
            ->select('industries.municipal_district', 'provinces.province', 'municipal_districts.id')
            ->get();

        return $industries;
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
    public function changeTown(Request $request)
    {

        $towns = DB::table('towns')
            ->leftjoin('provinces', 'provinces.id', '=', 'towns.provinceId')
            ->where('towns.provinceId', $request->id)
            ->select('towns.town', 'provinces.province', 'towns.id')
            ->get();

        return $towns;
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