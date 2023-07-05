<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Models\ModelBook;
use Illuminate\Support\Facades\DB;




class BookController extends Controller
{

    public function index()
    {
        $elementos = ModelBook::all();

        return view('index', ['elementos' => $elementos]);
    }



    public function create()
    {
        return view('create');
    }



    public function store(BookRequest $request)
    {
        $cad=ModelBook::create([
            'titulo'=>$request->titulo,
            'descricao'=>$request->descricao,
            'status'=>$request->status
        ]);

        if($cad){
            return redirect('tasks');
        }
    }



    public function show(string $id)
    {
        $elemento = ModelBook::find($id);
        $mensagemConclusao = $elemento->status == 'concluido' ? 'Atividade concluída' : 'Atividade não concluída';
        return view('show', compact('elemento', 'mensagemConclusao'));
    }



    public function edit($id)
    {
        $elemento = ModelBook::find($id);
        return view('create', compact('elemento'));
    }


    public function update(BookRequest $request, $id)
    {
        $elemento = ModelBook::where(['id' => $id]);

        $elemento->update([
            'titulo'=>$request->titulo,
            'descricao'=>$request->descricao,
            'status'=>$request->status
        ]);

        return redirect('/tasks');
    }


    public function destroy(string $id)
    {
        $elemento = ModelBook::find($id);
        $elemento->delete();

        return redirect('/tasks');

    }
}
