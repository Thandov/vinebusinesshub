<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewIndustryNotification;
use App\Models\PendingApprovals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PendingApprovalsController extends Controller
{
    public function insertIndustry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'the_content' => 'required|alpha_spaces',
        ], [
            'alpha_spaces' => 'The :attribute may only contain letters and spaces.',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        $company_rep = $request->input("who_id");
        $business_name = DB::table('businesses')->where('company_rep', $company_rep)->value('business_name');
        $industry = $request->input("the_content");

        $existingIndustry = DB::table('pending_approvals')->where('the_content', $industry)->first();
        if ($existingIndustry) {
            return response()->json(['message' => 'This industry already exists.'], 422);
        }
        $datasave = [
            'who_id' => $request->input("who_id"),
            'uid' => 0,
            'the_content' => ucfirst($request->input("the_content")),
            'approval_type' => $request->input("approval_type"),
            'approval_status' => 'pending',
        ];
        DB::table('pending_approvals')->insert($datasave);

        Mail::to('ntokozoflex99@gmail.com')->send(new NewIndustryNotification($industry, $business_name));

        return response()->json(['message' => 'Your industry has been submitted for review!']);
    }
}