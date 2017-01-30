@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')

<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                		<div class="panel-heading"><h1> Os meus dados Pessoais </h1></div>
		                <div class="panel-heading">
		                		<div class="upimg">
		                		<h2><img src="/avatars/{{ $user->avatar }}"></h2>

		                		<form  enctype ="multipart/form-data" action="/perfil" method="POST">
		                		<LABEL>Actualizar foto de Perfil</LABEL>
		                	
		                		<input type="file" name="avatar" id="avsub">
		                		<input type="hidden" name="_token" value="{{csrf_token()}}">
		                		<input type="submit" id="avsub">
		                		</form>
		                		</div>
		         				<p> Nome: {{$user->name}}</p>
								<p> Perfil de Utilizador: {{$perfil}} </p>

								
						</div>
								<div class="panel-heading"><h1>A minha avaliação </h1></div>
								@foreach($avaliacao as $avaliacao)
								<p> Trabalho Efectuado: {{round($avaliacao->wd,2)}} </p>
								<p> Compreensão do trabalho{{round($avaliacao->wc,2)}} </p>
								<p> Qualidade do Trabalho {{round($avaliacao->qw,2)}}</p>
								<p> Cooperação {{round($avaliacao->co,2)}} </p>
								<p> Compromisso {{round($avaliacao->cm,2)}}</p>
								<p> Eficiencia {{round($avaliacao->ef,2)}}</p>
								@endforeach
								<p> Rating Atual: {{round($rating,2)}} </p>
								


			</div>
		</div>
	</div>
</div>



@endsection('content')

@section('footer')
@parent
@endsection('footer')