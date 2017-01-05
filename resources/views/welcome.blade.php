@extends('layouts.app')


@section('menu')

@endsection('menu')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Avaliar, Organizar, Facilitar a Cooperação entre Alunos</h1>
                </div>

        <div class="panel-body">

		<p id="tit_wel">Descrição das Funcionalidades da Plataforma:</p>
		<ul id="lista_wel">
		<li>Encontrar membros para grupo</li>
		<li>Avaliar membros</li>
		<li>Produzir melhor trabalho</li>
		<li>Trabalhar com quem mais me identifico</li>
		<li>Identificar membros com àreas de interesse</li>
		</ul>

        </div>
            </div>
        </div>
    </div>
</div>
	
<div id="espaço2">
</div>


@endsection('content')
@section('footer')
@parent
@endsection('footer')