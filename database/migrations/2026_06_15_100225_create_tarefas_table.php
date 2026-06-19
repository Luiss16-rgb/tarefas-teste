<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('tarefa');
            $table->text('descricao');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('restrict');
            $table->enum('estado', ['Por Iniciar', 'Em Curso', 'Concluída'])->default('Por Iniciar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
