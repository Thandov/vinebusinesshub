<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewIndustryNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $business_id = $request->input("who_id");
        $business_name = DB::table('businesses')->where('id', $business_id)->value('business_name');

        $datasave = [
            'who_id' => $request->input("who_id"),
            'uid' => 0,
            'the_content' => $request->input("the_content"),
            'approval_type' => $request->input("approval_type"),
            'approval_status' => 'pending',
        ];
        DB::table('pending_approvals')->insert($datasave);

        $industry = $request->input("the_content");

        Mail::to('info@kayiseit.com')->send(new NewIndustryNotification($industry, $business_name));

        return response()->json(['message' => 'Your industry has been submitted for review!']);
    }
}
