<x-layout title="Tarefa {{ $tarefa->tarefa }}" :categorias="$categorias" :totalTarefas="$totalTarefas">
    @if (session('success'))
        <div class="alert alert-success mb-4 text-white !p-2">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tarefas.index') }}">
        <i class="fi fi-rr-arrow-small-left !text-[35px] !p-2"></i>
    </a>

    <div class="flex flex-col gap-2 p-4 w-1/2">
        <span class="text-xs uppercase opacity-90 block">
            {{ $tarefa->categoria->nomeCategoria }}
        </span>
        <div>
            <h1 contenteditable="true" class="text-2xl font-bold outline-none"
                oninput="document.getElementById('input-hidden-{{ $tarefa->id }}').value = this.innerText">
                {{ $tarefa->tarefa }}</h1>

            <p class="text-gray-500 text-xs">{{ $tarefa->updated_at->format('d/m/Y') }}</p>
        </div>
        <p contenteditable="true" class="text-gray-700 outline-none"
            oninput="document.getElementById('inputDescricao-hidden-{{ $tarefa->id }}').value = this.innerText">
            {{ $tarefa->descricao }}</p>

        <div class="flex flex-row gap-2">
            @if ($tarefa->estado == 'Por Iniciar')
                <form action="{{ route('tarefas.iniciar', $tarefa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-btn type="submit" class="btn bg-yellow-500 min-w-[3rem] min-h-[2rem]"><i
                            class="fi fi-ss-play-circle flex items-center text-base">Iniciar</i></x-btn>
                </form>
            @elseif ($tarefa->estado == 'Em Curso')
                <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-btn type="submit" class="btn bg-green-500 min-w-[3rem] min-h-[2rem]"><i
                            class="fi fi-ss-check-circle flex items-center text-base">Concluír</i></x-btn>
                </form>
            @endif
            <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="tarefa" id="input-hidden-{{ $tarefa->id }}"
                    value="{{ $tarefa->tarefa }}">
                <input type="hidden" name="descricao" id="inputDescricao-hidden-{{ $tarefa->id }}"
                    value="{{ $tarefa->descricao }}">
                <x-btn class="bg-green-500 btnHover h-full min-w-[3rem] min-h-[2rem]" type="submit"><i
                        class="fi fi-bs-floppy-disk-pen !text-lg flex items-center"></i></x-btn>
            </form>
            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                @csrf
                @method('DELETE')
                <x-btn type="submit" class="bg-red-500 btnHover h-full min-w-[3rem] min-h-[2rem]"><i
                        class="fa-solid fa-trash"></i></x-btn>
            </form>
        </div>
    </div>
</x-layout>
