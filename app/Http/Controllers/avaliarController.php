<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\student_grade;
use App\Models\User;
use App\Models\group;

use DB;
use Auth; 


class avaliarController extends Controller
{
       public function index()
    {
        return view('avaliar');
    }

    public function show(Request $request)
	{
   		$grades = student_grade::all();
    	
    return view('avaliar',compact('grades'));
    }

    public function meusGrupos(Request $request)
    {
        
        $grades = student_grade::all();

        $user = Auth::user();
        $id=$user->id; 

//grupos a que pertence o utilizador      
        $grupos = $user->groups();
        $meusGrupos = $grupos->get()->all();
        

// elementos do mesmo grupo

$grpId = $grupos->pluck('id');
$users_degroup = DB::table('group_user')
->join('users', function($join) use($grpId)
{  
  $join->on('users.id', '=', 'group_user.user_id')
  ->where('group_id','=', $grpId) ;
})
->get();
//dd($users_degroup);

return view('avaliar',compact('users_degroup','meusGrupos','id','grades'));
    }

//classificação:
   public function add(Request $request)
    {

        $grade = new student_grade;
        $grade->utilizadores_idUser = $request->utilizadores_idUser;
        $grade->work_done = $request->work_done;
        $grade->work_comprehension = $request->work_comprehension;
        $grade->cooperation = $request->cooperation;
        $grade->commitment = $request->commitment;
        $grade->efficiency = $request->efficiency;
        $grade->quality_work = $request->quality_work;
        $grade->save();
        
        return redirect('avaliar');
    }


public function alunoEscolhido(Request $request,$idescl){

    $user = Auth::user();
    $id=$user->id;

    $input = $idescl;

    $users_degroup = DB::table('group_user')
        ->leftjoin('users', 'users.id', '=', 'group_user.user_id')               
        ->get();



// mostra notas do aluno
$grades = DB::table('students_grades')
        ->where (function($q) use($input)
            {
           $q->where('utilizadores_idUser', '=', $input);
            })
            ->get();

//dd($grades);

            // FIQUEI AQUI

// calcula qnts vezes foi classificado
$rank = DB::table('students_grades')
        ->where (function($q) use($input)
            {
           $q->where('utilizadores_idUser', '=', $input);
            })
            ->get()->count();
//dd($rank); 
//->sum('work_done','work_comprehension','quality_work','cooperation','commitment','efficiency');
           

            
    
    return view('avClgs',compact('input','users_degroup','id','idescl','grades','rank'));
}



    public function constGrupo(Request $request,$grp){

        $user = Auth::user();
        $id=$user->id; 
        $grpID = $grp ;
        //elementos dos grupos 
        
        $grupos = $user->groups();
        $meusGrupos = $grupos->get()      
        ->all();
  
  //dd($grpID);


$users_degroup = DB::table('group_user')
->join('users', function($join) use($grpID)
{  
  $join->on('users.id', '=', 'group_user.user_id')
  ->where('group_id','=', $grpID) ;
 //dd($grpID);
})
->get();

//dd($users_degroup);
        return view('avaliacao',compact('users_degroup','id','meusGrupos'));
    }
    
}



