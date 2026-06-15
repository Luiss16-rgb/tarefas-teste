<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable('tarefa', 'descricao', 'categoria_id', 'estado')]
class Tarefa extends Model
{
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
