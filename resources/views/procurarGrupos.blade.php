@extends('layouts.app')
<style>
table, th, td {
    border: 1px solid black;
}
</style>

@section('menu')

@endsection('menu')

@section('content')

<div class="container">
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">O seu curso é  {{$curso}}  </div>
                <div class="panel-heading">
                <h1 id="tit_pag3">Selecione a disciplina </h1>
                </div>
                <div class="panel-body">
                @foreach($discipline as $discp) 
<a>					
{{Form::open(array('action' => array('procurarGrupoController@disciplina_escolhida',$discp->id)))}}
{{ Form::submit($discp->discp_name),array('class' => 'primary')}}
{{ Form::close() }}
</a>					
@endforeach
                </div>
                </div>
                </div>
                </div>
                </div>

@endsection('content')
@section('footer')
@parent
@endsection('footer')