@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($elemento))Editar @else Cadastrar @endif</h1> <hr>

    <div class="col-8 m-auto">


        @if(isset($elemento))
            <form name="formEdit" id="formEdit" method="post" action="{{url("tasks/$elemento->id")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('tasks')}}">
        @endif

        <form name="formCad" id="formCad" method="post" action="{{url('tasks')}}">
            @csrf

            <label for="titulo" class="form-label">Título da tarefa</label>
            <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Título" value="{{$elemento->titulo ?? ' '}}" required> <br>

            <label for="descricao" class="form-label">Descrição da tarefa</label>
            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{$elemento->descricao ?? ' '}}" required> <br>

            <label for="status" class="form-label">Status da tarefa</label>
            <select id="status" name="status" class="form-select" required>
                @if (isset($elemento) && $elemento->status == 'concluido')
                  <option value="concluido" selected>Tarefa concluída</option>
                  <option value="nao_concluido">Tarefa não concluída</option>
                @elseif(isset($elemento) && $elemento->status == 'nao_concluido')
                  <option value="concluido">Tarefa concluída</option>
                  <option value="nao_concluido" selected>Tarefa não concluída</option>
                @else
                    <option value="">Situação</option>
                    <option value="concluido">Tarefa concluída</option>
                    <option value="nao_concluido">Tarefa não concluída</option>
                @endif
              </select>
            <input class="btn btn-primary" type="submit" value="@if(isset($elemento))Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection
