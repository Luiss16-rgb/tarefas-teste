<x-layout title="Criar Tarefa" :categorias="$categorias" :totalTarefas="$totalTarefas">
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Interações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nomeCategoria }}</td>
                        <td>{{ $categoria->created_at }}</td>
                        <td>ola</td>
                    </tr>
                @empty
                    ola
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
