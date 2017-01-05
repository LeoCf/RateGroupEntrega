@extends('layouts.app')
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<div>
<h1>Alunos com grupo Formado </h1>
<table id="alunosComGrupo" class="tabelaComGrupo" width="100%">
	<tr>
		<th>Nome</th>
		<th>Curso</th>
		<th>Avaliação Media</th>
		<th>Perfil</th>
		<th>Grupo</th>
	</tr>
	<tr>
@foreach($grupos_formados as $nome)
<tr><td>{{$nome->name}}</td><td>{{$nome->group_id}}</td><td></tr>
@endforeach

</td>
</tr>
</tr>
</table>
</div>



@section('footer')
@parent
@endsection('footer')