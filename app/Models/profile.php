<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public function users(){

    	return $this->belongsToMany('App\Models\user');
    }


}
