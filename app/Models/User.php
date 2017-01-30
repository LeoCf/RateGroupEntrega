<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract

{
    //Tabela associada com o modelo
    use Authenticatable;
 
    protected $table ='Users';

    protected $fillable = ['id','name', 'email', 'password','inst_id','course_id', 'created_at', 'updated_at','profile_id','type'];

    //Relação muitos para muitos com o curso
    public function course()
    {
		return $this->hasOne('App\Models\Course');
 	}

 	//Relação muitos para muitos com a disciplina
    /*Relação muitos para muitos com as disciplinas , 
    3 campo é a chave estrangeira do modelo onde estamos a definir a relação , 
    o 4 é a chave estrangeiro do modelo ao qual nos estamos a juntar 
    */
 	public function disciplines()
    {	
    	return $this->belongsToMany('App\Models\Discipline','discipline_user','user_id','udiscp_id');
    }

     	public function groups()
    {	//1º nome do modelo , 2º tabela many to many , 3º e 4º nome das colunas
    	return $this->belongsToMany('App\Models\Group','group_user','user_id','group_id');
    }

        public function profiles()
    {
		return $this->hasOne('App\Models\profile');
 	}

    public function student_grades(){

        return $this->hasMany('App\Models\student_grade','utilizadores_idUser');
    }

}


