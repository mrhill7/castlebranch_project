<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State as State_Model;

class States extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $state_ref
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show($state_ref, Request $request)
    {
        $state = State_Model::where('abbreviation', (string)$state_ref)->first();
        // 404s on requests from states not in the database.
        if(! isset($state))
        {
            return response()->json(['message' => 'State not found!'], 404);
        }
        // Checking for optional Zip in request
        if(isset($request->zip))
        {
            $counties = $state->counties_cities()->where('zip', '!=', $request->zip)->get();
        }
        else
        {
            $counties = $state->counties_cities;
        }
    
        $unique_counties = array();
        $final_counties = array();

        // get each unique county name
        foreach($counties as $county)
        {
            if(! in_array($county->county_name, $unique_counties))
            {
                array_push($unique_counties, $county->county_name);
                
            }
        }
        // create the data structures to encode into json
        foreach($unique_counties as $unique_county)
        {
            $cities = array();
            foreach($counties as $county)
            {
                if($county->county_name === $unique_county)
                {
                    array_push($cities, array("name"=>$county->city_name, "zip"=>$county->zip));
                }
            }
            array_push($final_counties, array('name'=>$unique_county, 'cities'=>$cities));
        }
        // Final Response and Return
        $finished_response = array('state'=> $state->name, 'counties' => $final_counties);

        return response()->json($finished_response);
    }

}
