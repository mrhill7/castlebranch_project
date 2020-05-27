<?php

use Illuminate\Database\Seeder;
use App\Counties_Cities;
use App\State;

class CountiesCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nc_entries = array(
            array(
                "county_name"=>"Brunswick",
                "zip"=>"28461",
                "city_name"=>"Oak Island"
            ),
            array(
                "county_name"=>"Brunswick",
                "zip"=>"28461",
                "city_name"=>"Southport"
            ),
            array(
                "county_name"=>"Brunswick",
                "zip"=>"28461",
                "city_name"=>"Saint James"
            ),
            array(
                "county_name"=>"Alamance",
                "zip"=>"27215",
                "city_name"=>"Burlington"
            ), 
            array(
                "county_name"=>"Altamahaw",
                "zip"=>"27202",
                "city_name"=>"Burlington"
            ),
            array(
                "county_name"=>"Carolina Beach",
                "zip"=>"28428",
                "city_name"=>"New Hanover"
            )
        );

        $ca_entries = array( 
            array(
                "county_name"=>"Anaheim",
                "zip"=>"92850",
                "city_name"=>"Orange"
            )
        );

        $nc_state = State::where('abbreviation', 'NC')->first();
        $ca_state = State::where('abbreviation', 'CA')->first();

        foreach($nc_entries as $nc_entry)
        {
            $new_county = new Counties_Cities;
            $new_county->county_name = $nc_entry["county_name"];
            $new_county->zip = $nc_entry["zip"];
            $new_county->city_name = $nc_entry["city_name"];
            $new_county->state_id = $nc_state->id;
            $new_county->save();
        }
        
        foreach($ca_entries as $ca_entry)
        {
            $new_county = new Counties_Cities;
            $new_county->county_name = $ca_entry["county_name"];
            $new_county->zip = $ca_entry["zip"];
            $new_county->city_name = $ca_entry["city_name"];
            $new_county->state_id = $ca_state->id;
            $new_county->save();
        }
    }
}
