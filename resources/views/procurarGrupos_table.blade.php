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
                		<table id="alunosComGrupo" class="tabelaComGrupo" width="100%">
						<tr>
						<th>Nome</th>
						<th>Id do Grupo</th>
						<th>Juntar-se ao Grupo</th>
						</tr>
					</div>
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
						</table>
			</div>	
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Alunos à procura de grupo  </h1></div>
                	<div class="panel-body">
                		<table id="alunosSemGrupo" class="tabelaSemGrupo" width="100%">
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
							<td></td>
							<td>{{$perfil_users->find($users->profile_id)->name }} </td>
							<td>{{Form::Button("Convidar")}}</td>
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