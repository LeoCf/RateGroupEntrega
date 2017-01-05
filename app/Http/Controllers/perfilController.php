<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Discipline;
use App\Models\Institution;
use App\Models\User;
use App\Models\Group;
use App\Models\Profile;
use Auth;
use DB;


class perfilController extends Controller
{
   
    //funcão principal que mostra dados do utilizador
    public function index()
    {
    	$user = Auth::user();
    	$id=$user->id;
        $user_prof_id=$user->profile_id;
  
        $perfil=Profile::where('id',$user_prof_id)->pluck('name');

        //Query que faz o avg dos diferentes parametros de avaliação é necessario incluir o use db nos imports
        $avaliacao=$user->student_grades()->select(DB::raw('avg(work_done) wd, avg(work_comprehension) wc, avg(quality_work) qw, avg(cooperation) co, avg(commitment) cm, avg(efficiency) ef'))->get();

    //Função que calcula o rating da avaliação
        $rating= $avaliacao->sum(function ($avaliacao) use ($user)
        {
            $soma=$avaliacao->wd + $avaliacao->wc + $avaliacao->qw + $avaliacao->co + $avaliacao->cm + $avaliacao->ef;
            return $soma/6;
        });

    
  
    	return view('perfil',compact('user','perfil','avaliacao','rating'));
    }

}
	