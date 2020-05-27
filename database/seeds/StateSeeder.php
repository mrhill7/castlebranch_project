<?php

use Illuminate\Database\Seeder;
use App\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state_entries = array(
            array('name'=>"North Carolina", 'abbreviation'=>"NC"), 
            array('name'=>"California",'abbreviation'=>"CA")
        );

        foreach($state_entries as $state_entry)
        {
            $new_state = new State;
            $new_state->name = $state_entry['name'];
            $new_state->abbreviation = $state_entry['abbreviation'];
            $new_state->save();
        }
    }
}
