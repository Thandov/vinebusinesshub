<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Industry;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Http\RedirectResponse;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        for ($i=0; $i<count($request->service_name); $i++) {
            $datasave = [
                'industry' => $request->service_name[$i],
            ];
            DB::table('industries')->insert($datasave);
        }

        //return redirect()->back();


        pendingIndustry::create([
            'name'=>$request->input('industry_name')
        ]);

        Mail::to('admin')->send(new NewIndustryAdded($request->input('industry_name')));
        return response()->json([
            'status'=>'success',
        ]);
    }
    public function approveIndustry($id)
    {
        $pendingIndustry = PendingIndustry::fnd($id);

        Industry::create([
            'name' =>$pendingIndustry->name
        ]);
        $pendingIndustry->delete;

        return redirect()->back()->with('success','Industry added');
    }
 
    public function rejectIndustry($id){
 
        pendingIndustry::find($id)->delete();
        return redirect()->back()->with('success','Industry REJECTED!!');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function deleteIndustry($id)
    {
        $data = Industry::find($id);
        $data->delete();
        return redirect('adminpanel');
    }

    public function insertIndustry(Request $request)
    {

        for ($i=0; $i<count($request->service_name); $i++) {
            $datasave = [
                'industry' => $request->service_name[$i],
            ];
            DB::table('industries')->insert($datasave);
        }

        return json_encode(array("statuscode" => 1, "message" =>  $request->service_name[0]." Inserted"));
    }

    
}