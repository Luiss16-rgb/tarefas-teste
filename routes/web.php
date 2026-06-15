<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tarefas.index');
});

Route::resource('categorias', CategoriaController::class);
Route::resource('tarefas', TarefaController::class);

// Rotas extra para mudar o estado das tarefas
Route::patch('tarefas/{tarefa}/iniciar', [TarefaController::class, 'iniciar'])->name('tarefas.iniciar');
Route::patch('tarefas/{tarefa}/concluir', [TarefaController::class, 'concluir'])->name('tarefas.concluir');