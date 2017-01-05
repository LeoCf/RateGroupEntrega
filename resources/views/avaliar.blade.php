@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')
 


<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if($meusGrupos != null)
                <div class="panel-heading"> Rate </div>
                <div class="panel-heading"> Grupos a que pertenco </div>  
                     <div class="panel-heading">                       
                        @foreach($meusGrupos as $grps) 
                        {{Form::open(array('action' => array('avaliarController@constGrupo', $grps->id)))}}
                        {{Form::submit($grps->nome)}}                       
                        {{Form::close()}}
                        @endforeach  
                    </div>
                   @else
                   <div class="panel-heading"> Não pertence a nenhum Grupo </div>
                   @endif                                                
                <div class="panel-heading"> Colegas a Classificar </div>
                <div class="panel-heading">
                       @foreach($users_degroup as $clgsGrp)
                       @if ($clgsGrp->id != $id)  
                        {{Form::open(array('action' => array('avaliarController@alunoEscolhido', $clgsGrp->user_id)))}}                                         
                        {{Form::submit($clgsGrp->name)}}
                        {{Form::close()}}
                        @endif
                        @endforeach                       
                </div>


               



</div>
    </div>
        </div>
	        </div>
                </div>

@endsection('content')

@section('footer')
@parent
@endsection('footer')