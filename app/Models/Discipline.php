<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    //Relação muitas para muitos com o curso
	public function courses()
    {
    	return $this->belongsToMany('App\Models\Course','course_discipline','discp_id','course_id');
    }

    /*Relação muitos para muitos com as disciplinas , 
    3 campo é a chave estrangeira do modelo onde estamos a definir a relação , 
    o 4 é a chave estrangeiro do modelo ao qual nos estamos a juntar 
    */
    public function users()
    {
    	return $this->belongsToMany('App\Models\User','discipline_user','udiscp_id','user_id');
    }
//Relaão um para muitos com as disciplinas
    public function groups(){

    	return $this->hasMany('App\Models\group','discp_id');
    }
}
