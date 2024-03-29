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
   ->leftjoin('provinces', 'provinces.id', '=', 'municipal_districts.provinceId')
   ->select('municipal_districts.municipal_district', 'provinces.province', 'provinces.id')
   ->get();
  return view('home', ['business' => $business, 'industry' => $industry, 'provinces' => $provinces, 'municipal_districts' => $municipal_districts]);

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
  $query             = $request->get('query');
  $searchOption      = $request->get('searchOption');
  $numOfCols         = 3;
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
    $business = DB::table('businesses')
     ->join('industries', 'industries.id', '=', 'businesses.industryId')
     ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
     ->select('businesses.id', 'businesses.logo', 'businesses.business_name', 'industries.industry', 'provinces.province')
     ->where('province', 'LIKE', $query . '%')
     ->paginate(10); // limit to 10 results per page
   } elseif ($searchOption === "industrySearch") {
    $business = DB::table('businesses')
     ->join('industries', 'industries.id', '=', 'businesses.industryId')
     ->join('provinces', 'provinces.id', '=', 'businesses.provinceId')
     ->select('businesses.id', 'businesses.business_name', 'industries.industry', 'provinces.province')
     ->where('industry', 'LIKE', $query . '%')
     ->paginate(10); // limit to 10 results per page
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