@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        Título: {{$elemento->titulo}}<br>
        Descrição: {{$elemento->descricao}}<br>
        Status: {{$mensagemConclusao}}<br>
    </div>
@endsection
