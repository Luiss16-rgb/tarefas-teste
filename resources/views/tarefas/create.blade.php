<x-layout title="Criar Tarefa" :categorias="$categorias" flex="flex justify-center">
    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <div class="flex align-items flex-col gap-4 justify-center">
            <fieldset>
                <legend class="label">Título</legend>
                <input type="text" name="tarefa" placeholder="Nome da Tarefa"
                    class="input input-bordered w-full max-w-xs">
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
                <textarea name="descricao" placeholder="Descrição da Tarefa" class="textarea textarea-bordered w-full max-w-xs"></textarea>
                @error('descricao')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <button type="submit" class="btn">Criar Tarefa</button>
        </div>
    </form>
</x-layout>
