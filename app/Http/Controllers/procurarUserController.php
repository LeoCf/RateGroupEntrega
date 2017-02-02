<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Institution;
use App\Models\Course;

class procurarUserController extends Controller
{
   	public function index() {
   		$userFound='';
   		return view('procurarUser',compact('userFound'));
   	}


	public function showUser(Request $request)
	{
	 	$userName=$request->completar;
		$userFound=User::where('name',$userName)->first();
		if(!empty($userFound))
		{
			$institution=Institution::find($userFound->inst_id);
			$course=Course::find($userFound->course_id);
			$avaliacao=$userFound->student_grades()->select(DB::raw('avg(work_done) wd, avg(work_comprehension) wc, avg(quality_work) qw, avg(cooperation) co, avg(commitment) cm, avg(efficiency) ef'))->get();

			  $rating= $avaliacao->sum(function ($avaliacao) use ($userFound)
	        {
	            $soma=$avaliacao->wd + $avaliacao->wc + $avaliacao->qw + $avaliacao->co + $avaliacao->cm + $avaliacao->ef;
	            return $soma/6;
	        });
			
		return view('procurarUser',compact('userFound','userName','institution','course','rating'));
		}	
		else 
		{
		$userFound='empty';
		
		return view('procurarUser',compact('userFound','userName'));
		}
	}

		public function liveSearch(Request $request,$key)
		{
	        $query = "%".$request->key."%";
	        $users= User::where('name','LIKE',$query)->get();
	        foreach($users as $user)
	        {
	            print "<div id='item' data-name='$user->name'>$user->name</div>";
	        }
   		 }

	
}