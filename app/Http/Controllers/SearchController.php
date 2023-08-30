<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function  search(Request $request)
    {
        $query = $request->input('search');
        
        $resultsQuery = DB::table('businesses')
            ->where('business_name', 'LIKE', '%' . $query . '%');
    
        $industry = $request->input('industry');
        if ($industry) {
            $resultsQuery->where('industry', $industry);
        }
    
        $results = $resultsQuery->get();
    
        return view('search-results', ['query' => $query, 'industry' => $industry, 'results' => $results]);
    }
    
    
    
}
