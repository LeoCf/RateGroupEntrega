<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{		

	//relação muitos para muitos com a disciplinas
           public function classes()
    {
    	return $this->belongsToMany('App\Models\Discipline','course_discipline','course_id','discp_id');
    }

    	public function User (){

    		return $this->hasMany('App\Models\User','course_id');
    	}


}
