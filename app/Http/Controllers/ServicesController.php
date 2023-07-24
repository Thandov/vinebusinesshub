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
    public function show(Services $services)
    {
        //
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