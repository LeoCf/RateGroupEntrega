@extends('layouts.app')


@section('content')
<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                                <div class="panel-heading"><h1>Os meus dados academicos </h1></div>
                                    <div class="panel-heading"> A minha instituição:   {{$instituição}}
                                    <br>  
                                    O meu curso:  {{$curso}}                               
                                    @foreach($discipline as $discp_active) 
                                    {{Form::open(array('action' => array('gerirDiscpGroupController@remover_disciplina_utilizador', $discp_active->id)))}}
                                    Disciplinas Activa : {{Form::submit($discp_active->discp_name)}} 
                                    {{Form::close()}}
                                    @endforeach
                                    </div>  
                                    <div class="panel-heading"><h1>Grupo Activos</h1>
                                    @foreach($grupos_activos as $grup_activos)
                                    Grupo Activo: {{Form::button($grup_activos->nome)}} <br> <br>
                                    @endforeach
                                    </div>
                                                           
                                    <div class="panel-heading"><h1>Disciplinas do Curso  </h1></div>
                                    <div class="panel-heading"><h2>Disciplinas disponiveis para inscrição:</h2>
                                @foreach($disciplinas_do_curso_unsub as $discp_curso) 
                                {{Form::open(array('action' => array('gerirDiscpGroupController@adicionar_disciplina_utilizador', $discp_curso->id)))}}
                                {{Form::submit($discp_curso->discp_name)}}
                                 {{Form::close()}}
                                @endforeach       
                                </div>

<div class="panel-heading"><h1>Introduzir novo grupo</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="gerirDisciplinasGrupos" method="POST" id='jsValidation'>
{{Form::token()}}


{{Form::label('nomeGrupo', 'Nome do Grupo', array('class' => 'formGrupo'))}}
{{Form::text('nomeGrupo')}}

{{Form::label('num_alunos', 'Numero  de  Alunos', array('class' => 'formGrupo'))}}
{{Form::select('numeroAlunos', [1, 2, 3,4,5,6,7,8,9,10])}}

{{Form::label('date_fim', 'Data  de  Fim  ', array('class' => 'formGrupo'))}}
{{Form::date('date') }}

{{Form::label('password', 'password', array('class' => 'formGrupo'))}}
{{Form::password('password')}}

{{Form::label('disciplina_cg' ,'Selecionar Disciplina', array('class' => 'formGrupo'))}}
{{Form::select('disciplina_cg', $grupos_nao_activos )}}

{{Form::submit('Criar Grupo')}}
</form>
</div>

<br> <br> <br>
</div>
  {!! $validarJs !!}



@endsection('content')



