<x-layout title="Criar Tarefa" :categorias="$categorias" :totalTarefas="$totalTarefas">
    @if (session('success'))
        <div class="alert alert-success mb-4 text-white !p-2">
            {{ session('success') }}
        </div>
    @elseif (session('erro'))
        <div class="alert alert-error mb-4 text-white !p-2">
            {{ session('erro') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Nº Tarefas</th>
                <th>Interações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr>
                        <td class="w-1/3">
                            <h1 contenteditable="true" name="nomeCategoria" id="nomeCategoria" class="outline-none p-1 break-all"
                            oninput="document.getElementById('input-hidden-{{ $categoria->id }}').value = this.innerText">{{ $categoria->nomeCategoria }}</h1>
                        </td>
                        <td>{{ $categoria->created_at }}</td>
                        <td>{{ $categoria->tarefas_count }}</td>
                        <td class="flex flex-row gap-1">
                            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="nomeCategoria" id="input-hidden-{{ $categoria->id }}" value="{{ $categoria->nomeCategoria }}">
                                <x-btn class="bg-green-500 btnHover h-full min-w-[3rem] min-h-[2rem]" type="submit"><i
                                        class="fi fi-bs-floppy-disk-pen !text-l flex items-center"></i></x-btn>
                            </form>
                            <a href="{{ route('categorias.show', $categoria->id) }}">
                                <x-btn class="bg-blue-500 btnHover h-full min-w-[3rem] min-h-[2rem]"><i
                                        class="fa-solid fa-eye"></i></x-btn>
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                @csrf
                                @method('DELETE')
                                <x-btn type="submit" class="bg-red-500 btnHover h-full min-w-[3rem] min-h-[2rem]"><i
                                        class="fa-solid fa-trash"></i></x-btn>
                            </form>
                        </td>
                    </tr>
                @empty
                    ola
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
