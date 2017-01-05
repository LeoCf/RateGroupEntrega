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
                 
                     <div class="panel-heading">
                      @else
                   <div class="panel-heading">Não Existem elementos no Grupo </div>
                   @endif                                                
                <!-- <div class="panel-heading"> A Classificar aluno com o ID {{$input}}</div> 
                
        <div class="panel-heading"> Classificar </div> -->

         <form method="POST" action="/avaliar">
                
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <input type="hidden" class="form-control" name="utilizadores_idUser" value="{{$input}}" >
                     <br> 
                     Realização do Trabalho:
                     <input class="form-control" name="work_done" >
                     <br>
                     Compreensão do Trabalho: 
                     <input class="form-control" name="work_comprehension">
                     <br>
                     Cooperação no Trabalho: 
                     <input class="form-control" name="cooperation">
                     <br>
                     Empenho no Trabalho:
                     <input class="form-control" name="commitment">
                     <br>
                     Eficiência do Trabalho:
                     <input class="form-control" name="efficiency">
                     <br>
                     Qualidade do Trabalho:
                     <input class="form-control" name="quality_work">
                     <br>
                     <button type="submit" class="btn btn-primary"> Nova Avaliação</button>
          </form>

</div>
                <div class="panel-heading"> 
                @section('calc')
                <?php $calc = '0'; ?>             
                       @foreach($grades as $ranking)                                      
                       {{Form::button($calc+=(($ranking->work_done + $ranking->work_comprehension + $ranking->quality_work + $ranking->cooperation + $ranking->commitment + $ranking->efficiency)/6))}}
                       @endforeach  
                @stop('calc')
                <div class="panel-heading"> Ranking </div>  
                        {{$calc/$rank}}
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