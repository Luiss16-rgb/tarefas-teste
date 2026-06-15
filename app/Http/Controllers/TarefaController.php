<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tarefa::with('categoria')->latest();

        if ($request->filtro == 'nao_concluidas') {
            $query->where('estado', '!=', 'Concluída');
        } elseif ($request->filtro == 'por_iniciar') {
            $query->where('estado', 'Por Iniciar');
        } elseif ($request->pesquisa) {
            $query->where('tarefa', 'like', '%'.$request->pesquisa.'%')
                ->orWhere('descricao', 'like', '%'.$request->pesquisa.'%');
        }

        $tarefas = $query->get();

        return view('tarefas.index', compact('tarefas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('tarefas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarefa' => 'required|max:50',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Tarefa::create($request->all());

        return redirect()->route('tarefas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefas.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        $categorias = Categoria::all();

        return view('tarefas.edit', compact('tarefa', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'tarefa' => 'required|max:50',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $tarefa->update($request->all());

        return redirect()->route('tarefas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return redirect()->route('tarefas.index');
    }

    public function iniciar(Tarefa $tarefa)
    {
        $tarefa->update(['estado' => 'Em Curso']);
        return redirect()->route('tarefas.index');
    }

    public function concluir(Tarefa $tarefa)
    {
        $tarefa->update(['estado' => 'Concluída']);
        return redirect()->route('tarefas.index');
    }
}
