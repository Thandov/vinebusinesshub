<?php 
// app/Services/ClientService.php

namespace App\Services;

use App\Models\Services;
use Illuminate\Support\Facades\DB;


class ClientService
{
    public function insertclientservice(array $request)
    {
        
        $service_names = $request['serviceId'];
        //To ensure we have the correct services, make sure we delete 
        //all based on their service id, incase more than one business
        DB::table('clientsservices')->select('*')->where('clientsservices.bid', $request['bid'])->delete();
       
        foreach ($service_names as $service_id) {
        $datasave = ['serviceId'=> $service_id,'bid' => $request['bid'],'industryId' => $request['industryId'], 'created_at' => NOW(), 'updated_at' => NOW() ];
        DB::table('clientsservices')->insert($datasave);
        }
        return redirect()->back();
        
    }
}