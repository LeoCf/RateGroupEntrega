<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Discipline;
use App\Models\Institution;
use App\Models\User;
use App\Models\Group;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use JsValidator;
use Auth;

class gerirDiscpGroupController extends Controller
{
    protected $validacao=[
        'nomeGrupo'=> 'bail|required|unique:Groups,nome',
        'numeroAlunos' => 'required|max:255',
        'date' => 'required|after:today',
        'password' =>'required',
        'disciplina_cg'=>'required',

    ];

    public function getDisciplines()
    {
        $disciplinas=Discplines()->get();
        return $disciplinas;
	        
    }
    

     public function index()
    {   

        //Validação Javascript usando biblioteca
        $validarJs = JsValidator::make($this->validacao);
        //Dados do Utilizador 
    	$user = Auth::user();
    	$id=$user->id;
    	$inst_id=$user->inst_id;
        $user_prof_id=$user->profile_id;
    	$instituição=Institution::where('id',$inst_id)->pluck('inst_name');
    	$course_id=$user->course_id;

        $curso=Course::where('id',$course_id)->pluck('course_name'); 
        $perfil=Profile::where('id',$user_prof_id)->pluck('name');

	    $discipline =$user->Disciplines()->pluck('discp_name','id');

        /*
        $grupos_activos = Group::whereHas('users',function($q) use($id)//colocar use id scope da var
	    {
            $q->where('user_id', $id);
        })->pluck('nome','id');
        */


        $curso=Course::where('id',$course_id)->pluck('course_name'); 
        $perfil=Profile::where('id',$user_prof_id)->pluck('name');
	    $discipline =$user->Disciplines()->get(); 

        //Grupos onde o utilizador se encontra isncrito
        $grupos_activos=$user->groups()->get(); 
        
       
    
        //Disciplinas em que o utilizador esta inscrito mas não tem grupo
        $grupos_nao_activos=$discipline->diffKeys($grupos_activos)->pluck('discp_name','id'); 
        //Disciplinas do curso e posteriormente verificar as disciplinas do curso não associados ao utilizador usando o diff
	    $disciplinas_do_curso =Discipline::whereHas('courses',function($q) use($course_id)
        {
            $q->where('course_id', $course_id);
        })->get();
          
                //Ver quais as disciplinas do curso que não estão associadas ao utilizador     
                $disciplinas_do_curso_unsub=$disciplinas_do_curso->diff($discipline);
                
               
        
        //Vista retornada e os dados passados a essa view atraves do metodo compact
    	return view('gerirDisciplinasGrupos',compact('curso','discipline','user','instituição','group_id','grupos_activos','disciplinas_do_curso_unsub','grupos_nao_activos','validarJs'));
    }

    //Utilizador Subscreve disciplina e esta é adicionada a base de dados
    public function adicionar_disciplina_utilizador(Request $request) 
    {
         $teste=$request->id;
         print $teste;

        $user = Auth::user();
        $discipline = Discipline::find($request->id);
        print $discipline;
        $discipline->users()->attach($user,['user_inst'=>$user->inst_id]); //como não estava a introduzir o 'user_isnt' teve se ser assim

      return redirect ('gerirDisciplinasGrupos');
    }

    //Remover disciplina em que o utilizador se encontra inscrito
    public function remover_disciplina_utilizador(Request $request)
    {
        $user = Auth::user();
        $discipline = Discipline::find($request->id);
        $user->disciplines()->detach($discipline);
        return redirect("/gerirDisciplinasGrupos");
     }

     //adiciona um grupo ao utilizador por ele criado
     public function adicionar_grupo_utilizador(Request $request) 
     {

       // $this->validate($request, $validacao
        
         $validar = Validator::make($request->all(), $this->validacao);

        
         if ($validar->fails())
        {
            return redirect()->back()->withErrors($validar->errors());
        }


        $user=Auth::user();
        $nome_grupo=$request->nomeGrupo;
        $numero_alunos=$request->numeroAlunos;
        $date=$request->date;
        $password=$request->password;
        $disciplina_id=$request->disciplina_cg;

        $group=new group();
        $group->nome=$nome_grupo;
        $group->data_fim=$date;
        $group->m_limit=$numero_alunos;
        $group->discp_id=$disciplina_id;
        $group->password=$password;

        $group->save();

        $group->users()->attach($user,['gu_inst_id'=>$user->inst_id,'gu_discp_id'=>$group->discp_id]);
       


        return redirect("/gerirDisciplinasGrupos");
     }
}
