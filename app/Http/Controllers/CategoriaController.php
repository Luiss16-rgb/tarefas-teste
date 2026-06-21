<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalTarefas = Tarefa::count();
        $categorias = Categoria::withCount('tarefas')->get();

        return view('categorias.index', compact('categorias', 'totalTarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('categorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomeCategoria' => 'required|min:2|max:100',
        ]);

        Categoria::create($request->all());

        return redirect()->back()->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        $totalTarefas = Tarefa::count();
        $categorias = Categoria::withCount('tarefas')->get();

        $categoriaAtual = $categoria;

        $tarefas = Tarefa::where('categoria_id', $categoria->id)->get();

        return view('tarefas.index', compact('categorias', 'tarefas', 'totalTarefas', 'categoriaAtual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nomeCategoria' => 'required|min:2|max:100',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        if ($categoria->tarefas()->count() > 0) {
            return redirect()->route('categorias.index')
                ->with('erro', 'Não é possível eliminar uma categoria com tarefas associadas!');
        }
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria eliminada com sucesso!');
    }
}
