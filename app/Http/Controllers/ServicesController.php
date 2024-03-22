<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Industry;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $jsonString = $request->selectedServices;
        $clientServices = json_decode($jsonString, true);
        // Assuming $request->id holds the value you want to match
        $industryId = $request->id; // Example value

        // Retrieve all services where the id matches the industryId
        $services = Services::where('industryId', $industryId)->get();

        // Initialize an empty array to hold the HTML markup
        $html = '';
        $ticktok = 0;
        // Loop through each service and generate HTML markup
        foreach ($services as $key => $service) {
            foreach ($clientServices as $key => $clientService) {
                $html .= $clientServices;
            }
            $html .= '<div class="mt-1 space-y-4 md:col-span-12">';
            $html .= '<div class="flex items-start">';
            $html .= '<div class="flex items-center h-5">';
            $html .= '<label for="custserv' . $service->id . '" class="font-medium text-gray-700">';
            $html .= '<input name="serviceId[]" id="custserv' . $service->id . '" value="' . $service->id . '" type="checkbox" class="mr-3 focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded">';
            $html .= $service->service_name . '</label>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $ticktok += 1;
        }

        // Return the HTML markup as JSON response
        return response()->json(['html' => $html]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        //

    }

    public function deleteService($id)
    {
        //
        $data = Services::find($id);
        $data->delete();
        return redirect('adminpanel');
    }

    public function insert(Request $request)
    {
        $rules = array(
            'id.*' => 'required',
            'service_name.*' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['error' => $validator->errors()->all()]);
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        $service_name = $request->service_name;

        $dataToInsert = [];

        for ($i = 0; $i < count($service_name); $i++) {
            // Check if both $service_name and $request->id have the required index
            if (isset($service_name[$i], $request->id)) {

                $service = new Services();
                $service->service_name = $service_name[$i];
                $service->industryId = $request->id;
                $service->save();
            }
        }
        if ($request->ajax()) {
            return response()->json(['success' => 'Data inserted successfully']);
        }

        return redirect('adminpanel')->with('status', 'Profile updated!');
    }



    public function insertclientservice(Request $request)
    {

        $service_name = $request->serviceId;

        $data = DB::table('clientsservices')
            ->select('*')
            ->where('clientsservices.bid', $request->bid)
            ->delete();

        for ($i = 0; $i < count($service_name); $i++) {

            $datasave = [
                'serviceId' => $request->serviceId[$i],
                'bid' => $request->bid,
                'industryId' => $request->industryId
            ];
            DB::table('clientsservices')->insert($datasave);
        }
        return redirect()->back();
    }
}
