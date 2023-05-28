<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendingApprovalsController extends Controller
{
    public function insertIndustry(Request $request)
    {
        $business_id = $request->input("who_id");
        $business_name = DB::table('businesses')->where('id', $business_id)->value('business_name');

        $datasave = [
            'who_id' => $request->input("who_id"),
            'uid' => 0,
            'the_content' => $request->input("the_content"),
            'approval_type' => $request->input("approval_type"),
            'approval_status' => 0,
        ];
        DB::table('pending_approvals')->insert($datasave);

        $industry = $request->input("the_content");

        Mail::to('ntokozoflex99@gmail.com')->send(new NewIndustryNotification($industry, $business_name));

        return response()->json(['message' => 'Your industry has been submitted for review!']);
    }
}
