<x-layout title="Tarefa {{ $tarefa->tarefa }}" :categorias="$categorias">
    <a href="{{ route('tarefas.index') }}">
        <i class="fi fi-rr-arrow-small-left !text-[35px] !p-2"></i>
    </a>
    <div class="flex flex-col gap-2 p-4">
        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')
            <div>
                <h1 class="text-2xl font-bold">{{ $tarefa->tarefa }}</h1>

                <p class="text-gray-500 text-xs">{{ $tarefa->updated_at->format('d/m/Y') }}</p>
            </div>
            <p class="text-gray-700">{{ $tarefa->descricao }}</p>
        </form>

        @if ($tarefa->estado == 'Por Iniciar')
            <form action="{{ route('tarefas.iniciar', $tarefa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-btn type="submit" class="btn bg-yellow-500 !w-1/2">Iniciar</x-btn>
            </form>
        @elseif ($tarefa->estado == 'Em Curso')
            <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <x-btn type="submit" class="btn bg-green-500 !w-1/2">Concluir</x-btn>
            </form>
        @endif
    </div>
</x-layout>
