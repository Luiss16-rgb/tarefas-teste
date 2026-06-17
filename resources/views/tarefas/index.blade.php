<x-layout title="Tarefas" :categorias="$categorias">
    @if (session('success'))
        <div class="alert alert-success mb-4 text-white !p-2">
            {{ session('success') }}
        </div>
    @endif


    <div class="grid grid-cols-3 gap-4 p-4">
        @forelse ($tarefas as $tarefa)
            <x-card nome="{{ $tarefa->tarefa }}" descricao="{{ $tarefa->descricao }}">
                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                    @csrf
                    @method('DELETE')
                    <x-btn type="submit" class="bg-red-500 h-full min-w-[3rem] min-h-[2rem]"><i class="fa-solid fa-trash"></i></x-btn>
                </form>
            </x-card>
        @empty
            <p>Nenhum contacto encontrado.</p>
        @endforelse
    </div>

</x-layout>
