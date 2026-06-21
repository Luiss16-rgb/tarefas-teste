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
        $categoriaAtual = null;
        $validatedData = $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $query = Tarefa::with('categoria')->latest();
        $totalTarefas = Tarefa::count();

        if ($request->filtro == 'nao_concluidas') {
            $query->where('estado', '!=', 'Concluída');
        } elseif ($request->filtro == 'por_iniciar') {
            $query->where('estado', 'Por Iniciar');
        } elseif ($request->filtro == 'em_curso') {
            $query->where('estado', 'Em Curso');
        } elseif ($request->filtro == 'concluidas') {
            $query->where('estado', 'Concluída');
        }

        $search = $validatedData['search'] ?? '';
        if ($search){
            $query->where(function ($q) use ($search) {
                $q->where('tarefa', 'like', "%{$search}%")
                    ->orWhere('descricao', 'like', "%{$search}%");
            });
        }

        $tarefas = $query->get();
        $categorias = Categoria::withCount('tarefas')->get();

        return view('tarefas.index', compact('tarefas', 'categorias', 'totalTarefas', 'categoriaAtual'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::withCount('tarefas')->get();
        $totalTarefas = Tarefa::count();

        return view('tarefas.create', compact('categorias', 'totalTarefas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarefa' => 'required|max:50',
            'descricao' => 'required|max:1000',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        Tarefa::create($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        $categorias = Categoria::withCount('tarefas')->get();
        $totalTarefas = Tarefa::count();

        return view('tarefas.show', compact('tarefa', 'categorias', 'totalTarefas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        $categorias = Categoria::withCount('tarefas')->get();
        $totalTarefas = Tarefa::count();

        return view('tarefas.edit', compact('tarefa', 'categorias', 'totalTarefas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'tarefa' => 'required|max:50',
            'descricao' => 'required|max:1000',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!');
    }

    public function iniciar(Tarefa $tarefa)
    {
        $tarefa->update(['estado' => 'Em Curso']);

        return redirect()->route('tarefas.show', $tarefa->id);
    }

    public function concluir(Tarefa $tarefa)
    {
        $tarefa->update(['estado' => 'Concluída']);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa concluída!');
    }
}
