<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function displayBusinesses()
    {
        $businesses = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry')
            ->paginate(12);

        $industry = DB::table('industries')
            ->select('industries.industry')
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

        return view('home', compact(['businesses', 'industry', 'provinces', 'municipal_districts', 'municipalities']));

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
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            $viewType = $request->get('viewType');
            $searchOption = $request->get('searchOption');
            $selectedDistrict = $request->get('selectedDistrict');
            $numOfCols = 3;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;

            if ($query != '') {
                if ($searchOption === "businessNameSearch") {
                    $data = DB::table('businesses')->join('industries', 'industries.id', '=', 'businesses.industryId')->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry')->where('business_name', 'LIKE', $query . '%')->paginate();
                    // $table_data = view('home')->with('businesses', $data)->render();
                    $pagination = $data->links('vendor.pagination.simple-bootstrap-4')->render();
                }
            }
            return response()->json([
                'data' => $data,
                'pagination' => $pagination,
            ]);
        }
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
