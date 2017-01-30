@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')

<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                		<div class="panel-heading"><h1> Os meus dados Pessoais </h1></div>		
		                		<img src="/avatars/{{ $user->avatar }}" class="upimg"/> 
		                		<p style="text-align:center; margin-top:20px;">Nome: {{$user->name}}</p>
		                		<p style="text-align:center">Perfil de Utilizador: {{$perfil}}</p>
		                		<p style="text-align:center">Email: {{$user->email}}</p>
		                		<p style="text-align:center">Membro desde: {{$user->created_at}}</p>
		                		<p style="text-align:center">Tipo de Conta: {{$user->type}}</p>
		                		<form  enctype ="multipart/form-data" action="/perfil" method="POST">
		                		<LABEL id="label_update">Actualizar foto de Perfil</LABEL>
		                		<input type="file" name="avatar" id="avsub">
		                		<input type="hidden" name="_token" value="{{csrf_token()}}">
		                		<input type="submit" id="avsub">
		                		</form>
		               
		         			
		                		@if(Auth::user()->type=='user')
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
								@endif


			</div>
		</div>
	</div>
</div>



@endsection('content')

@section('footer')
@parent
@endsection('footer')