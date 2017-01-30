@extends('layouts.app')
<style>
table, th, td {
    border: 1px solid black;

}


</style>

<script>
function Pedir_pass() {
    var x = document.getElementById("pass_btn").value;
    
}
</script>

@section('menu')

@endsection('menu')

@section('content')

<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Grupos Criados  </h1></div>
                	<div class="panel-body">
                	@if(Auth::user()->type=='user')
                		<table id="alunosComGrupo" class="tabelaDiscp" width="100%">
						<tr>
						<th>Nome</th>
						<th>Id do Grupo</th>
						<th>Juntar-se ao Grupo</th>
						</tr>
						
						<tr>
						@foreach($grupos_formados as $nome)
						{{Form::open(array('action' => array('procurarGrupoController@aderir_grupo', $nome->id)))}}
							<tr><td>{{$nome->nome}}</td><td>{{$nome->id}}</td>
							<td>Insira a password 
							<input id="password" type="password"  name="password" required>
							{{Form::submit('Aderir ao Grupo')}} 
							</td>
							</tr>
						{{Form::close()}}
						@endforeach
						</tr>

						


						@elseif(Auth::user()->type=='prof')
						<table id="alunosComGrupo" class="tabelaDiscp" width="100%">
						@foreach($grupos_formados as $nome)
						<tr>
						<th>Nome do Grupo: {{$nome->nome}}</th>
						<th>Id do Grupo: {{$nome->id}}</th>
						</tr>
						</table>
						
						<table id="alunosComGrupo" class="tabelaDiscp" width="100%">
						<th>Elementos do Grupo</th>
						<th>Id do Curo</th>
						@foreach($usersGroup as $users) 
						<tr><td>{{$users->name}}</td>
						<td>{{$users->course_id}}</td>
						<td>{{$users->rating}}</td>
						<td>{{$perfil_users->find($users->profile_id)->name }} </td>
						@endforeach
						@endforeach
						</table>
						@endif
			



			</div>	
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Alunos à procura de grupo  </h1></div>
                	<div class="panel-body">
                		<table id="alunosSemGrupo" class="tabelaDiscp" width="100%">
						<tr>
						<th>Nome</th>
						<th>Curso</th>
						<th>Avaliação Media</th>
						<th>Perfil</th>
						<th>Enviar Convite</th>
						</tr>
					</div>
						<tr>
						@foreach($users_nogroup as $users) 
							<tr><td>{{$users->name}}</td>
							<td>{{$users->course_id}}</td>
							<td>{{$users->rating}}</td>
							<td>{{$perfil_users->find($users->profile_id)->name }} </td>
							<td>@if(!($user->id==$users->id)){{Form::Button("Convidar")}} @endif</td>
							</tr>
						@endforeach
						</table>
					</div>
</div>
</div>
</div>




@endsection

@section('footer')
@parent

@endsection('footer')