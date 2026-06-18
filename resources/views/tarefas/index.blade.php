<x-layout title="Tarefas" :categorias="$categorias">
    
    @if (session('success'))
        <div class="alert alert-success mb-4 text-white !p-2">
            {{ session('success') }}
        </div>
    @endif


    <div class="grid grid-cols-3 gap-4 p-4">
        @forelse ($tarefas as $tarefa)
            @php
                $bg = 'bg-base-100';
                if ($tarefa->estado == 'Por Iniciar') {
                    $bg = 'bg-base-100';
                    $estado = 'porIniciar';
                } elseif ($tarefa->estado == 'Em Curso') {
                    $bg = 'bg-yellow-200';
                    $estado = 'emCurso';
                } else {
                    $bg = 'bg-green-300';
                    $estado = 'concluida';
                }
            @endphp
            <a href="{{ route('tarefas.show', $tarefa->id) }}">
                <x-card nome="{{ $tarefa->tarefa }}" descricao="{{ $tarefa->descricao }}"
                    data="{{ $tarefa->created_at->format('d/m/Y') }}" bg="{{ $bg }}" estado="{{ $estado }}">
                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                        @csrf
                        @method('DELETE')
                        <x-btn type="submit" class="bg-red-500 h-full min-w-[3rem] min-h-[2rem]"><i
                                class="fa-solid fa-trash"></i></x-btn>
                    </form>
                </x-card>
            </a>
        @empty
            <a href="{{ route('tarefas.create') }}">
                <x-card nome="Crie Uma Tarefa" descricao="Não há tarefas cadastradas no momento." bg="bg-yellow-200"
                    tipo="card-criar"
                    estado="criarNovo">
                    <x-btn type="submit" class="bg-green-500 h-full min-w-[3rem] min-h-[2rem]"><i
                            class="fi fi-rr-add !text-xl flex items-center"></i></x-btn>
                </x-card>
            </a>
        @endforelse
    </div>

</x-layout>
