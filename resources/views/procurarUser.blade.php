
@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')

      


<script>

$(document).ready(function () {

        var typingTimer;                
        var doneTypingInterval = 300;  
        $("#searchbox").on('keyup', function () {
            clearTimeout(typingTimer);
            if ($('#searchbox').val()) {
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            }
        });
    });

$(document).on('click', '#item', function() {

    $('#searchbox').val($(this).data('name'));
    $('#results').empty();

});

    function doneTyping() {

        var key = $('#searchbox').val();
        if (key.length >= 3) {
            $.ajax({
                url: '/procurarUser/liveSearch/' +key,
                type: 'GET',
                beforeSend: function () {
                    $("#results").slideUp('fast');
                },
                success: function (data) {
                    $("#results").html(data);
                    $("#results").slideDown('fast');
                  
                }
            });
   }

}


</script>

<div class="container">
	 <div class="panel panel-default">
    	<div class="panel-heading"><h1> Pesquisa de Utilizador  </h1></div>
    	{{Form::open(array('url' => 'procurarUser/showUser')) }}
        <div id="content">
        <input type="text" name="completar" placeholder="Nome Utilizador" id="searchbox">
        <div id="results"></div>
        </div>
        {{Form::submit('Procurar')}} 
    	{{Form::close()}}
        @if(!empty($userFound))
        @if(!strcmp($userFound,"empty"))
        <div class="panel-heading"><h1> Utilizador com o nome: {{$userName}} não Encontrado </h1>
        @else
        <div class="panel-heading"><h1> Utilizador Encontrado </h1>
        <img src="/avatars/{{ $userFound->avatar }}" class="img_userProcurar"/> 
        <p style="text-align:center;font-weight:bold;">{{$institution->inst_name}}
        <p style="text-align:center;font-weight:bold;">{{$course->Course_name}}
        <p style="text-align:center;font-weight:bold;">Rating Actual: {{$rating}}
        @endif
        @endif
        
        
        </div>


</div>
</div>


        
    	



	





@endsection('content')

@section('footer')
@parent
@endsection('footer')