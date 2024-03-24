<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use App\Services\ClientService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
    $this->clientService = $clientService;
    }
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

        return view('/', ['business' => $business, 'provinces' => $provinces, 'industry' => $industry]);
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
    public function show()
    {
        $id = auth()->user()->id;
        $business = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'users.email_verified_at', 'businesses.*', 'provinces.province', 'industries.industry')
            ->where('businesses.company_rep', $id)
            ->first();
        $provinces = DB::table('provinces')
            ->select('*')
            ->get();

        $services = DB::table('services')
            ->select('*')
            ->get();

        $industries = DB::table('industries')
            ->select('*')
            ->get();

        $rep = DB::table('users')
            ->select('name', 'email')
            ->where('users.id', $business->company_rep)
            ->first();

        $municipalities = DB::table('municipalities')
            ->select('*')
            ->get();

        $districts = DB::table('municipal_districts')
            ->select('*')
            ->get();

        $towns = DB::table('towns')
            ->select('*')
            ->get();
            
        $industryIds = [];
        $clientsservices = DB::table('clientsservices')->select('*')->where('clientsservices.bid', $business->id)->get();

        foreach ($clientsservices as $clientService)
        {
            $industryId = $clientService->industryId;
            if (!in_array($industryId, $industryIds))
            {
            $industryIds[] = $industryId;
            }
        }

        return view('business/businessdashboard', ['rep' => $rep, 'towns' => $towns, 'districts' => $districts, 'business' => $business, 'provinces' => $provinces, 'services' => $services, 'industries' => $industries, 'municipalities' => $municipalities, 'clientsservices' => $clientsservices, 'industryIds' => $industryIds]);
    }


    public function bus_reg()
    {
        $urlSegments = explode('/', request()->path());

        $id = auth()->user()->id;
        $business = DB::table('businesses')
        ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
        ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
        ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
        ->select('users.name', 'users.email_verified_at', 'businesses.*', 'provinces.province', 'industries.industry')
        ->where('businesses.company_rep', $id)
        ->first();

        $industryIds = [];
        $clientsservices = DB::table('clientsservices')->select('*')->where('clientsservices.bid', $business->id)->get();
        
        foreach ($clientsservices as $clientService) 
        {
            $industryId = $clientService->industryId;
            if (!in_array($industryId, $industryIds)) 
            {
                $industryIds[] = $industryId;
            }
        }
        
        $businessData = [
            'rep' => DB::table('users')->select('name', 'email')->where('users.id', $business->company_rep)->first(),
            'business' => $business,
            'provinces' => DB::table('provinces')->select('id', 'province')->get(),
            'services' => DB::table('services')->select('id', 'industryId', 'category_id', 'service_name')->get(),
            'industries' => DB::table('industries')->select('id', 'industry')->get(),
            'municipalities' => DB::table('municipalities')->select('id', 'municipality', 'districtId')->get(),
            'districts' => DB::table('municipal_districts')->select('id', 'municipal_district', 'provinceId')->get(),
            'towns' => DB::table('towns')->select('*')->get(),
            'clientsservices' => $clientsservices,
            'industryIds' => $industryIds,
        ];

        return view('/business/registration', compact('businessData', 'industryIds', 'urlSegments'));
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

            $arr = ["bid" => $req->business_id, "serviceId" => $req->serviceId, "industryId" => $req->industryId];
            $this->clientService->insertclientservice($arr);
        
        $id = auth()->user()->id;
        $business = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'users.email_verified_at', 'businesses.*', 'provinces.province', 'industries.industry')
            ->where('businesses.company_rep', $id)
            ->first();
        
        $validated = $req->validate([
            'business_name' => 'required',
            'business_number' => 'required|numeric|max:999999999999999',
            'email' => 'required|email',
            'business_bio' => 'required',
        ], [
            'business_number.max' => 'Invalid business number. The number must not exceed 15 digits.',
        ]);
        $data = Business::find($business->id);
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

        return redirect('/');

    }

    public function showBusiness($businessName)
    {
        $business = DB::table('businesses')
            ->leftjoin('industries', 'industries.id', '=', 'businesses.industryId')
            ->leftjoin('provinces', 'provinces.id', '=', 'businesses.provinceId')
            ->leftjoin('municipal_districts', 'municipal_districts.id', '=', 'businesses.districtId')
            ->leftjoin('municipalities', 'municipalities.id', '=', 'businesses.municipalityId')
            ->leftjoin('users', 'users.id', '=', 'businesses.company_rep')
            ->select('users.name', 'businesses.*', 'provinces.province', 'industries.industry', 'municipal_districts.municipal_district', 'municipalities.municipality')
            ->where('businesses.business_name', $businessName)
            ->first();

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
            ->where('clientsservices.bid', $business->id)
            ->get();

        $rep = DB::table('users')
            ->select('*')
            ->where('users.id', $business->id)
            ->get();

        return view('viewBusiness', ['rep' => $rep, 'business' => $business, 'provinces' => $provinces, 'services' => $services, 'industries' => $industries, 'clientsservices' => $clientsservices]);

    }

    public function saveclientservices(Request $request)
    {
        $arr = ["bid" => $request->bid, "serviceId" => $request->serviceId, "industryId" => $request->industryId];
        $this->clientService->insertclientservice($arr);
        return redirect()->back()->with('success', 'Client services saved successfully.');
    }

    public function updateClientLocation(Request $request)
    {
    $business = Business::find($request->bid); // Find the business by bid
   
    if ($business) {
        // Business found, update its information
        $business->update([
        'address' => $request->address,
        'provinceId' => (int)$request->provinceId,
        'districtId' => (int)$request->districtId,
        'municipalityId' => (int)$request->municipalityId,
        'town' => $request->town, // Assuming you want to set it to null if not provided
        ]);
        // Redirect or return response after successful update
        return redirect()->back()->with(['success' => 'Business information updated successfully.']);
        } else {
        // Business not found
        return redirect()->back()->with(['error' => 'Business not found.'], 404);
        }
    }

}