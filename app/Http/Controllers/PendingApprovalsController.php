<?php

namespace App\Http\Controllers;

use App\Models\pendingApprovals;
use Illuminate\Http\Request;

class PendingApprovalsController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pendingApprovals  $pendingApprovals
     * @return \Illuminate\Http\Response
     */
    public function show(pendingApprovals $pendingApprovals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pendingApprovals  $pendingApprovals
     * @return \Illuminate\Http\Response
     */
    public function edit(pendingApprovals $pendingApprovals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pendingApprovals  $pendingApprovals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pendingApprovals $pendingApprovals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pendingApprovals  $pendingApprovals
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendingApprovals $pendingApprovals)
    {
        //
    }

    public function insertIndustry(Request $request)
    {
        
      dd($request);
        for ($i=0; $i<count($request->service_name); $i++) {
            $datasave = [
                'approval_type' => $request->service_name[$i],
            ];
            DB::table('pending_approvals')->insert($datasave);
        }

        return json_encode(array("statuscode" => 1, "message" =>  $request->service_name[0]." Inserted"));
    }

}
