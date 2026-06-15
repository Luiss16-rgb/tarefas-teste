<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nomeCategoria')]
class Categoria extends Model
{
    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'categoria_id');
    }
}
