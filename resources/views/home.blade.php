@extends('layouts.app')

@section('menu')

@endsection('menu')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <p>Bem Vindo ao RateMe</p>
                <p>You are logged in!</p></div>

                <div class="panel-body">
                <div id="centrar">
                    
                     <p>Cumpra com as regras de boa utilização:</p>
                     <br>
                      <p>Seja Responsável</p>
                      <p>Avalie com seriedade</p>
                      <p>Avalie com critério</p>
                      <p>Avalie com sensatez</p>
                      <p>Avalie com consciência</p>
                      <p>Avalie com descernimento</p>
                      <br>
                      <br>
                      <br>
                      <p>Lembre-se que esta é uma ferramenta para melhorar o trabalho em grupo num contexto académico.</p>
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
