<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    // define table & primary key
	protected $table = 'groups';
  
	public function discipline()
    {
        return $this->belongsTo('App\Models\Discipline');
    }
 


     	public function users()
    {
    	//1º nome do modelo , 2º tabela many to many , 3º e 4º nome das colunas //4 coluna grupo for retirado por causar problemas no grupos activos
    	return $this->belongsToMany('App\Models\User','group_user','group_id','user_id'); 
    }
    
}