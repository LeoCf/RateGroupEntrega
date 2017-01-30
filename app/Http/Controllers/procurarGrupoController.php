<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Discipline;
    use App\Models\course;
    use App\Models\User;
    use App\Models\Institution;
    use App\Models\profile;
    use App\Models\student_grade;
    use App\Models\group;
use Illuminate\Support\Facades\Input;

use Auth;
use DB;

class procurarGrupoController extends Controller 
{
  
    public function index()
    {
        $user = Auth::user();
    	$id=$user->id;
    	$course_id=$user->course_id;
        $curso=Course::where('id',$course_id)->pluck('course_name');                      
	    $discipline = Discipline::whereHas( 'users', function($q) use($id)	//colocar use id scope da var
	    {
            $q->where('user_id', $id);
        })->get();

        return view('procurarGrupos',compact('curso','discipline'));
    }

      
    public function disciplina_escolhida(Request $request,$id)
    {
        $user = Auth::user();
            //1º procuramos os utilizadores da disciplina 
        $discipline_user = User::whereHas( 'disciplines', function($q) use($id)    //colocar use id scope da var
        {
            $q->where('id', $id);
        })->get();
        
        //Depois vemos os utilizadores que tem grupo nessa disciplina
        $users_with_group=User::whereHas('groups',function($q) use($id)
        {
            $q->where('gu_discp_id',$id);  
        })->get();

        //vemos aqui quais os utilizadores que pertencem a disciplina mas não tem grupo 
        $users_nogroup=$discipline_user->diff($users_with_group);
        
        //Query relacionada com os grupos que estao formados na disciplinas
         $grupos_formados_user = Group::whereHas( 'users', function($q) use($id)
         {
            $q->where('gu_discp_id', $id);
        })->get();

        //Disciplinas em que o utilizador esta inscrito 
        $user=Auth::user();
        $grupos_activos_user=$user->groups()->get(); 
        
        //Grupos onde o utilizador esta na disciplina e ainda não tem grupo
        $grupos_formados=$grupos_formados_user->diff($grupos_activos_user);

        //parametro adicional para ser passado em caso de pass errada não esta implementado
        $pass_errada='';
        



        //Aqui é guardado o  id do perfil dos utilizador que não possuem grupo
        $perfil_users_id=$users_nogroup->map(function ($item, $key) {
           return $item->profile_id;

        });

        print($perfil_users_id);
        $rating = collect([]);
        //aqui ficam o nome do perfil que corresponde aos ids obtidos anteriormente
        $perfil_users=Profile::whereIn('id',$perfil_users_id)->get();
        foreach($users_nogroup as $user_eval)
        {

            $avaliacao=student_grade::where('utilizadores_idUser',$user_eval->id)->get();
            $rating->push(($avaliacao->sum(function ($avaliacao) 
            {
            $soma=$avaliacao->workd_done + $avaliacao->work_comprehension + $avaliacao->quality_work + $avaliacao->comprehension + $avaliacao->commitment + $avaliacao->efficienty;
                return $soma/6;
            })));
            

            //Avaliação dos utilizadores 
            $users_nogroup->map(function ($user_eval,$key) use($rating)  
            {
                return $user_eval['rating']=$rating->get($key);
            });


        }

   
        print($rating);
    
    
       return view('procurarGrupos_table',compact('users_nogroup','perfil_semGrupo','grupos_activos','grupos_formados','pass_errada','perfil_users','user'));
    }

    //função que retorna o curso do utilizador 
    public function getCourse()
    {
    	$curso  = Course::pluck('course_name','id');
    	return view('procurarGrupos',compact('curso'));
    }

    //Função para aderir ao grupo 
    public function aderir_grupo(Request $request)
    {
        $user=Auth::user();
        $group = Group::find($request->id);
        $group_password=$group->password;
        $group_inserted_psw=$request->password;

        //strcmp para verificar a password não é o metodo mais eficiente mas no ambito da cadeira serve
        if(!strcmp($group_password,$group_inserted_psw))
        {
            $pass_errada='';
            $group->users()->attach($user,['gu_inst_id'=>$user->inst_id,'gu_discp_id'=>$group->discp_id]);
        }
        else
        {
            $pass_errada="password errada tente novamente";
        }

         return redirect("/procurarGrupos");
    }


}
