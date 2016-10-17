<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class ApiController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete(Request $request){
        $term = $request['term'];

        $results = array();

        $queries = DB::table('companies')
            ->where('company', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->company ];
        }
        return response()->json($results);
    }

}
