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

        if($request->ajax())
        {
            
            $rules = array(
                'id.*'  => 'required',
                'service_name.*'  => 'required'
              );
              $error = Validator::make($request->all(), $rules);
              if($error->fails())
              {
                  return response()->json(['error'  => $error->errors()->all()]);
                }
            }
        $service_name = $request->service_name;

        for($i=0; $i<count($service_name); $i++)
        {
            
            $datasave = [
                'service_name' => $request->service_name[$i],
                'industryId' => $request->id
            ];
            DB::table('services')->insert($datasave);
        }
        

       return redirect('adminpanel')->with('status', 'Service updated!');

    }

    public function insertclientservice(Request $request)
    {

        $service_name = $request->serviceId;

        $data = DB::table('clientsservices')
            ->select('*')
            ->where('clientsservices.bid', $request->bid)
            ->delete();

        for($i=0; $i<count($service_name); $i++)
        {

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