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
            ->paginate(10); // limit to 10 results per page

        $industry = DB::table('industries')
            ->select('industries.industry')
            ->get();

        $provinces = DB::table('provinces')
            ->select('provinces.id', 'provinces.province')
            ->get();

        $municipal_districts = DB::table('municipal_districts')
            ->select('municipal_districts.id', 'municipal_districts.municipal_district')
            ->get();

        $grouped_municipal_districts = DB::table('municipal_districts')
            ->leftJoin('provinces', 'provinces.id', '=', 'municipal_districts.provinceId')
            ->select('municipal_districts.municipal_district', 'provinces.province', 'provinces.id')
            ->orderBy('provinces.id') // Optional: Order the results by province ID
            ->get()
            ->groupBy('id');

        $grouped_municipalities = DB::table('municipalities')
            ->leftjoin('municipal_districts', 'municipal_districts.id', '=', 'municipalities.districtId')
            ->select('municipalities.municipality', 'municipal_districts.municipal_district', 'municipal_districts.id')
            ->orderBy('municipal_districts.id')
            ->get()
            ->groupBy('id');

        //dd($grouped_municipalities);

        return view('home', [
            'business' => $business,
            'industry' => $industry,
            'provinces' => $provinces,
            'municipal_districts' => $municipal_districts,
            'grouped_municipal_districts' => $grouped_municipal_districts,
            'grouped_municipalities' => $grouped_municipalities,
        ]);
    }

    public function displayBusinessPagination()
    {

    }

    public function index()
    {
        if (Auth::user()->hasRole('business')) {

            return redirect('business/businessdashboard/' . Auth::user()->id);

        } elseif (Auth::user()->hasRole('user')) {

            return view('home');

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
        $query = $request->get('query');
        $searchOption = $request->get('searchOption');
        $viewType = $request->get('viewType');
        $numOfCols = 3;
        $bootstrapColWidth = 12 / $numOfCols;

        if ($query != '') {
            if ($searchOption === "businessNameSearch") {
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry')
                    ->where('business_name', 'LIKE', $query . '%')
                    ->paginate(10) // limit to 10 results per page
                    ->withQueryString(); // add this line to include other query parameters in the pagination link

            } elseif ($searchOption === "provinceSearch") {
                $provinces = explode(',', $query);
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province')
                    ->whereIn('province', $provinces)
                    ->paginate(10); // limit to 10 results per page

            } elseif ($searchOption === "districtSearch") {
                $municipal_districts = explode(',', $query);
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province', 'municipal_districts.municipal_district')
                    ->whereIn('municipal_district', $municipal_districts)
                    ->paginate(10);

            } elseif ($searchOption === "municipalitySearch") {
                $municipalities = explode(',', $query);
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
                    ->join('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province', 'municipalities.municipality')
                    ->whereIn('municipality', $municipalities)
                    ->paginate(10);

            } elseif ($searchOption === "industrySearch") {
                $industries = explode(',', $query);
                $provinces = explode(',', $query);
                $business = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->join('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
                    ->join('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province', 'municipalities.municipality')
                    ->whereIn('industry', $industries)
                    ->whereIn('province', $provinces)
                    ->paginate(10);
            }

        } else {
            $business = DB::table('businesses')
                ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
                ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
                ->select('businesses.*', 'businesses.business_name', 'industries.industry', 'provinces.province')
                ->where('activation_status', '=', 1)
                ->paginate(10); // limit to 10 results per page
        }

        $html = view('home._businesses', ['business' => $business])->render();
        $pagination = $business->links()->render();
        return response()->json(['html' => $html, 'pagination' => $pagination]);
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
            ->select('municipalities.municipality', 'municipal_districts.municipal_district', 'municipal_districts.id')
            ->get();

        return $municipalities;
    }

}
