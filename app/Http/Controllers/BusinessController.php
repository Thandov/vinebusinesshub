<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = DB::table('businesses')
            ->join('industries', 'industries.id', '=', 'businesses.industryId')
            ->select('businesses.*', 'industries.industry')
            ->get();

        $industry = DB::table('industries')
            ->select('industries.industry')
            ->orderByRaw("CASE WHEN industries.industry = 'Other' THEN 1 ELSE 0 END, industries.industry")
            ->get();

        $provinces = DB::table('provinces')
            ->select('provinces.province')
            ->get();

        return view('home', ['business' => $business, 'provinces' => $provinces, 'industry' => $industry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'users.email_verified_at', 'businesses.*', 'provinces.province', 'industries.industry')
            ->where('businesses.company_rep', $id)
            ->get();

        $provinces = DB::table('provinces')
            ->select('*')
            ->get();

        $services = DB::table('services')
            ->select('*')
            ->get();

        $industries = DB::table('industries')
            ->select('*')
            ->get();

        $clientsservices = DB::table('clientsservices')
            ->select('*')
            ->where('clientsservices.bid', $business[0]->id)
            ->get();

        $rep = DB::table('users')
            ->select('*')
            ->where('users.id', $business[0]->company_rep)
            ->get();

        $municipalities = DB::table('municipalities')
            ->select('*')
            ->get();

        $districts = DB::table('municipal_districts')
            ->select('*')
            ->get();

        return view('business/businessdashboard', ['rep' => $rep, 'districts' => $districts, 'business' => $business, 'provinces' => $provinces, 'services' => $services, 'industries' => $industries, 'municipalities' => $municipalities, 'clientsservices' => $clientsservices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function deleteBusinessandUser($id)
    {
        $userId = DB::table('businesses')
            ->select('businesses.company_rep')
            ->where('businesses.id', $id)
            ->get();

        $data = User::find($userId[0]->company_rep);

        $data->delete();

        return redirect('/')->with('success', ' Profile Successfully deleted');

    }

    public function updateBusiness(Request $req)
    {
        $validated = $req->validate([
            'business_name' => 'required',
            'business_number' => 'required|numeric|max:999999999999999',
            'email' => 'required|email',
            'business_bio' => 'required',
        ], [
            'business_number.max' => 'Invalid business number. The number must not exceed 15 digits.',
        ]);
        $data = Business::find($req->id);
        //dd($req->input());

        if ($req->business_name != $data->business_name) {
            //update the record for business_name
            $data->business_name = $req->business_name;
        }
        if ($req->business_number != $data->business_number) {
            //update the record for business_name
            $data->business_number = $req->business_number;
        }
        if ($req->email != $data->email) {
            //update the record for email
            $data->email = $req->email;
        }
        if ($req->business_bio != $data->business_bio) {
            //update the record for business_bio
            $data->business_bio = $req->business_bio;
        }
        if ($req->address != $data->address) {
            //update the record for address
            $data->address = $req->address;
        }
        if ($req->town != $data->town) {
            //update the record for town
            $data->town = $req->town;
        }
        if ($req->company_reg != $data->company_reg) {
            //update the record for company_reg
            $data->company_reg = $req->company_reg;
        }
        if ($req->website != $data->website) {
            //update the record for website
            $data->website = $req->website;
        }
        if ($req->industryId != $data->industryId) {
            //update the record for website
            $data->industryId = $req->industryId;
        }
        if ($req->districtId != $data->districtId) {
            //update the record for district
            $data->districtId = $req->districtId;
        }
        if ($req->municipalityId != $data->municipalityId) {
            //update the record for municipality
            $data->municipalityId = $req->municipalityId;
        }
        if ($req->facebook != $data->facebook) {
            //update the record for facebook
            $data->facebook = $req->facebook;
        }
        if ($req->twitter != $data->twitter) {
            //update the record for twitter
            $data->twitter = $req->twitter;
        }
        if ($req->instagram != $data->instagram) {
            //update the record for business_name
            $data->instagram = $req->instagram;
        }

        $data->activation_status = 1;

        if (!empty($req->file('file-upload'))) {
            $filename = $data->logo;

            //If first time uploading logo
            if (is_null($data->logo) || $data->logo !== $req->file('file-upload')) {
                //update the record for business_name
                $name = str_replace(' ', '_', strtolower($req->business_name));
                $image = $req->file('file-upload');
                $newImageName = time() . '-' . $name . '.' . $req->file('file-upload')->extension();
                $req->file('file-upload')->move(public_path('img'), $newImageName);
                $data->logo = $newImageName;
            }

        }
        if ($req->marketingpic != $data->marketingpic) {
            //update the record for business_name
            $data->marketingpic = $req->marketingpic;
        }
        if ($req->province != $data->province) {
            //update the record for business_name
            $data->provinceId = $req->province;
        }

        $data->save();

        return redirect()->back()->with('success', ' Profile Successfully updated');

    }

    public function showBusiness($id)
    {
        $business = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
            ->leftjoin('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry', 'municipal_districts.municipal_district', 'municipalities.municipality')
            ->where('businesses.id', $id)
            ->get();

        $provinces = DB::table('provinces')
            ->select('*')
            ->get();

        $services = DB::table('services')
            ->select('*')
            ->get();

        $industries = DB::table('industries')
            ->select('*')
            ->get();

        $clientsservices = DB::table('clientsservices')
            ->select('*')
            ->leftjoin('services', 'services.id', '=', 'clientsservices.serviceId')
            ->where('clientsservices.bid', $business[0]->id)
            ->get();

        $rep = DB::table('users')
            ->select('*')
            ->where('users.id', $business[0]->id)
            ->get();

        return view('viewBusiness', ['rep' => $rep, 'business' => $business, 'provinces' => $provinces, 'services' => $services, 'industries' => $industries, 'clientsservices' => $clientsservices]);
    }

    public function uploadLogo(Request $request)
    {
        echo $request;
    }
}
