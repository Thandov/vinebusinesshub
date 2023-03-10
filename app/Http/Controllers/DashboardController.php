<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use App\Models\Industry;
use App\Models\Province;
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
        ->get();
         
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

        return view('home', ['business' => $business, 'industry' => $industry, 'provinces' => $provinces, 'municipal_districts' => $municipal_districts]);

    }
    public function index() 
    {
        if(Auth::user()->hasRole('business')) {

            return redirect('business/businessdashboard/'.Auth::user()->id);

        }elseif(Auth::user()->hasRole('user')) {

            return view('home');

        }elseif(Auth::user()->hasRole('admin')) {

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
            $numOfCols = 3;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;

            if ($query != '') {
                if ($searchOption === "businessNameSearch") {
                    $data = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->select('businesses.id','businesses.logo', 'businesses.business_name', 'industries.industry')
                    ->where('business_name', 'LIKE', $query . '%')
                    ->get();
                } elseif($searchOption === "provinceSearch") {
                    $data = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province')
                    ->where('province', 'LIKE', $query . '%')
                    ->get();
                }elseif($searchOption === "industrySearch") {
                    $data = DB::table('businesses')
                    ->join('industries', 'industries.id', '=', 'businesses.industryId')
                    ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
                    ->select('businesses.id', 'businesses.business_name', 'industries.industry', 'provinces.province')
                    ->where('industry', 'LIKE', $query . '%')
                    ->get();
                }
                
            } else {
                $data = DB::table('businesses')
                ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
                ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
                ->select('businesses.*', 'businesses.business_name', 'industries.industry', 'provinces.province')
                ->where('activation_status', '=', 1)
                ->get();

            }
            $total_row = $data->count();

            if ($total_row > 0) {
                foreach ($data as $row) {
                    if ($viewType === 'cardView') {

                        if( empty($row->industry)) {  $row->industry = "Industry"; }
                        ( empty($row->logo))? $row->logo = "placeholder/placeholder.jpeg" : "";
                        $output .= '
                            <div class="card rounded-md mb-5 shadow-md overflow-hidden hover:shadow-lg" style="width: 100%;">
                                <div class="img-wrap overflow-hidden" style="background-size:cover; background-repeat: no-repeat; background-position:center;  background-size: cover">
                                <img src="../img/'. $row->logo .'" class="logoicon p-4"/>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="font-bold card-title text-green-600">' . $row->business_name . '</h5>
                                    <p class="card-text text-xs">' . $row->industry . '</p>
                                    <a href="/viewBusiness/' . $row->id . '" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 w-full">View</a>
                                </div>
                            </div>';
                    }
                    if ($viewType === 'listView') {
                        $output .= '
                        <tr>
                            <td>' . $row->id . '</td>
                            <td>' . $row->business_name . '</td>
                        </tr> 
                    ';
                    }
                }
            } else {
                if ($viewType === 'cardView') {
                    $output = 'No Data Found';
                }
                if ($viewType === 'listView') {
                    $output = '<tr><td>No Data Found</td></tr>';
                }
            }
            $data = array(
                'table_data' => $output,
            );
            echo json_encode($data);
        }
    }
    public function changeDistrict(Request $request) {
        
        $municipal_districts = DB::table('municipal_districts')
        ->leftjoin('provinces', 'provinces.id', '=', 'municipal_districts.provinceId')
        ->where('municipal_districts.provinceId', $request->id)
        ->select('municipal_districts.municipal_district', 'provinces.province', 'municipal_districts.id')
        ->get();

        return $municipal_districts;
    }
    public function changeMunicipality(Request $request) {
        
        $municipalities = DB::table('municipalities')
         ->leftjoin('municipal_districts', 'municipal_districts.id', '=', 'municipalities.districtId')
        ->where('municipalities.districtId', $request->id)
        ->select('municipalities.municipality', 'municipal_districts.municipal_district', 'municipal_districts.id')
        ->get();

        return $municipalities;
    }

}