<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tarefas.index');
});

Route::resource('categorias', CategoriaController::class);
Route::resource('tarefas', TarefaController::class);

// Rotas extra para mudar o estado das tarefas
Route::put('tarefas/{tarefa}/iniciar', [TarefaController::class, 'iniciar'])->name('tarefas.iniciar');
Route::put('tarefas/{tarefa}/concluir', [TarefaController::class, 'concluir'])->name('tarefas.concluir');