@extends('templates.template')

@section('content')
    <h1 class="text-center">CRUD</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("tasks/create")}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="bg-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($elementos as $elemento)
                <tr>
                    <td>{{$elemento->id}}</td>
                    <td>{{$elemento->titulo}}</td>
                    <td>{{$elemento->descricao}}</td>
                    <td>
                        <a href="{{url("tasks/$elemento->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="{{url("tasks/$elemento->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="{{ url("tasks/$elemento->id") }}" class="js-del" onclick="event.preventDefault(); if(confirm('Deseja excluir?')) document.getElementById('form-delete-{{ $elemento->id }}').submit();">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                        <form id="form-delete-{{ $elemento->id }}" action="{{ route('tasks.destroy', $elemento->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
