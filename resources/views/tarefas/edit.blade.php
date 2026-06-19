<x-layout title="Editar Tarefa" :categorias="$categorias" flex="flex justify-center">
    <a href="{{ route('tarefas.index', $tarefa->id) }}">
        <i class="fi fi-rr-arrow-small-left !text-[35px] !p-2"></i>
    </a>
    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex align-items flex-col gap-4 justify-center">
            <fieldset>
                <legend class="label">Título</legend>
                <input type="text" name="tarefa" placeholder="Nome da Tarefa"
                    class="input input-bordered w-full max-w-xs" value="{{ old('tarefa', $tarefa->tarefa) }}">
                @error('tarefa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <fieldset>
                <legend class="label">Categoria</legend>
                <select name="categoria_id" class="select select-bordered w-full max-w-xs">
                    <option disabled selected>Escolhe uma Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nomeCategoria }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <fieldset>
                <legend class="label">Descrição</legend>
                <textarea name="descricao" placeholder="Descrição da Tarefa" class="textarea textarea-bordered w-full max-w-xs">{{ old('descricao', $tarefa->descricao) }}</textarea>
                @error('descricao')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <button type="submit" class="btn">Atualizar Tarefa</button>
        </div>
    </form>
</x-layout>
