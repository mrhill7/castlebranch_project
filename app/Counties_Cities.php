<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counties_Cities extends Model
{
    /**
     * 
     * @var string
     */

     protected $table = "counties_cities";
     public $timestamps = false;

     public function state()
     {
         return $this->belongsTo('App\State');
     }
}
