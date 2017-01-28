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
use Illuminate\Support\Collection;

class apiController extends Controller
{
    //



	//Instituiçoes presentes na aplicaçao
    public function getInstitutions()
    {
    	$institutions=Institution::all();
    	return response()->json($institutions);
    }

    //Cursos por disciplina
    public function getCourses(Request $request )
    {
    	$name=$request->inst_name;
    	$inst=Institution::where('inst_name',$name)->first();
    	//$inst=$inst->pluck('id');
    	$course_inst=Course::where('inst_id',$inst->id)->get();
    	return response()->json($course_inst);
    }

   //Disciplinas no Curso 
    public function getDisciplines(Request $request )
    {
    	$name=$request->inst_name;
    	$course=$request->course_name;
    	$inst=Institution::where('inst_name',$name)->first();
    	$course_inst=Course::where('Course_name',$course)->first();
    	$discipline_cour=Discipline::whereHas('courses',function($q) use($course_inst,$inst)
        {
            $q->where('course_id', $course_inst->id);
        })->get();

    	return response()->json($discipline_cour);
    }

}
