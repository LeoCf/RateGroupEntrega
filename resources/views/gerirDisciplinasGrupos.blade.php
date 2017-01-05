@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')
<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                                <div class="panel-heading"><h1>Os meus dados academicos </h1></div>
                                    <div class="panel-heading"> A minha instituição:{{$instituição}}
                                    <br>  <br>  <br>
                                    O meu curso:  {{$curso}}                               
                                    @foreach($discipline as $discp_active) 
                                    {{Form::open(array('action' => array('gerirDiscpGroupController@remover_disciplina_utilizador', $discp_active->id)))}}
                                    Disciplinas Activa:{{Form::submit($discp_active->discp_name)}} 
                                    {{Form::close()}}
                                    @endforeach
                                    @foreach($grupos_activos as $grup_activos)
                                    Grupo Activo:{{Form::button($grup_activos->nome)}}
                                    @endforeach
                                    </div>                           
                                 <div class="panel-heading"><h1>Disciplinas do Curso  </h1></div>
                                @foreach($disciplinas_do_curso_unsub as $discp_curso) 
                                {{Form::open(array('action' => array('gerirDiscpGroupController@adicionar_disciplina_utilizador', $discp_curso->id)))}}
                            <div class="panel-heading"> Disciplinas disponiveis para inscrição: {{Form::submit($discp_curso->discp_name)}}
                                 {{Form::close()}}
                                @endforeach       
                            </div>

<div class="panel-heading"><h1>Introduzir novo grupo</h1></div>

{{Form::open(array('action' => 'gerirDiscpGroupController@adicionar_grupo_utilizador'))}}
{{Form::label('nome_grupo', 'Nome do Grupo', array('class' => 'form'))}}
{{Form::text('username')}}
<br> <br>
{{Form::label('num_alunos', 'Numero  de  Alunos', array('class' => 'awesome'))}}
{{Form::select('number', [1, 2, 3,4,5,6,7,8,9,10])}}
<br>
{{Form::label('date_fim', 'Data  de  Fim  ', array('class' => 'awesome'))}}
{{Form::date('date') }}
<br>
{{Form::label('password', 'password', array('class' => 'awesome'))}}
{{Form::password('password')}}
{{Form::select('disciplina_cg', $grupos_nao_activos)}}
<br>
{{Form::submit('Criar Grupo')}}
{{Form::close()}}

</div>                     
</div>
</div>
</div>
</div>

@endsection('content')