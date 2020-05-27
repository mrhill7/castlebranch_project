<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * 
     * @var string
     */
    protected $table = "states";
    public $timestamps = false;

    public function counties_cities()
    {
        return $this->hasMany('App\Counties_Cities');
    }
}
