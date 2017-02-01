
@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')

      


<script>
/*
$('loadUser').submit(function() { // catch the form's submit event
    $.ajax({ // create an AJAX call...
        data: $(this).serialize(), // get the form data
        type: $(this).attr('method'), // GET or POST
        url: $(this).attr('action'), // the file to call
        success: function(response) { // on success..
            $('showUser').html(response); // update the DIV
        }
    });
    return false; // cancel original event to prevent form submitting
});


</script>

<div class="container">
	 <div class="panel panel-default">
    	<div class="panel-heading"><h1> Pesquisa de Utilizador  </h1></div>
        
    	{{Form::open(array('url' => 'procurarUser/showUser')) }}
    	{{ Form::text('completar', '', ['id' =>  'completa', 'placeholder' =>  'Introduza nome utilizador'])}}
    	{{Form::submit('Procurar')}}
    	{{Form::close()}}
    	<div id='showUser'>
        @if(!empty($userFound))
        <div class="panel-heading"><h1> Utilizador Encontrado </h1>
        <p style="text-align:center; font-weight:bold;">{{$userFound->name}}</p>
        <img src="/avatars/{{ $userFound->avatar }}" class="img_userProcurar"/> 
        <p style="text-align:center;font-weight:bold;">{{$institution->inst_name}}
        <p style="text-align:center;font-weight:bold;">{{$course->Course_name}}
        <p style="text-align:center;font-weight:bold;">Rating Actual:{{$rating}}
        @endif
        @if(is_null($userFound))
        <div class="panel-heading"><h1> Utilizador com o nome: {{$userName}} não Encontrado </h1>
        @endif
        
        </div>


</div>
</div>


        
    	



	





@endsection('content')

@section('footer')
@parent
@endsection('footer')