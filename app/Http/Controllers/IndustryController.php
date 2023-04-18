<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Industry;
use App\Models\Province;
use App\Models\pendingApproval;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Mail\NewIndustryNotification;
use Illuminate\Support\Facades\Mail;

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
        for ($i=0; $i<count($request->service_name); $i++) {
            $datasave = [
                'industry' => $request->service_name[$i],
            ];
            DB::table('industries')->insert($datasave);
        }

        return redirect()->back();
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
        $uid = 0;

        
    $business_id = $request->input("who_id");
    $business_name = DB::table('businesses')->where('id', $business_id)->value('business_name');

            $datasave = [
                'who_id' => $request->input("who_id"),
                'uid' => $uid,
                'the_content' => $request->input("the_content"),
                'approval_type' => $request->input("approval_type"),
                'approval_status' => 0,
            ];
            DB::table('pending_approvals')->insert($datasave);
            

            $industry = $request->input("the_content");

            Mail::to('ntokozoflex99@gmail.com')->send(new NewIndustryNotification($industry, $business_name));
            
          return response()->json(['message' => 'Your industry is submitted for review!']);
        }

    public function approveindustry(Request $request)
     {
        for ($i=0; $i<count($request->service_name); $i++) {
            $datasave = [
                'approval_type' => $request->service_name[$i],
            ];
            DB::table('industries')->insert($datasave);
        }

        return json_encode(array("statuscode" => 1, "message" =>  $request->service_name[0]." Inserted"));
     }  
}