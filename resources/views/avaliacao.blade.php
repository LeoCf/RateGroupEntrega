@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')

<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if($users_degroup != null)
                <div class="panel-heading"> Rate </div>
                <div class="panel-heading"> Elementos do Gupo </div>  
                     <div class="panel-heading">                                           
                        @foreach($users_degroup as $grps)
                        @if ($grps->user_id != $id)                       
                        {{Form::open(array('action' => array('avaliarController@alunoEscolhido', $grps->user_id)))}}                                         
                        {{Form::submit($grps->name)}}
                        {{Form::close()}}
                        @endif                      
                        @endforeach  
                    </div>
                   @else

                   <div class="panel-heading"> Só existe você ou Não tem Elementos no Gupo </div>
                   @endif     

       </div>
       </div>
       </div>
       </div>
       


@endsection('content')

@section('footer')
@parent
@endsection('footer')


