<x-layout title="Criar Tarefa" :categorias="$categorias" flex="flex justify-center">
    <a href="{{ route('tarefas.index') }}">
        <i class="fi fi-rr-arrow-small-left !text-[35px] !p-2"></i>
    </a>
    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <div class="flex align-items flex-col gap-4 justify-center">
            <fieldset>
                <legend class="label">Título</legend>
                <input type="text" name="tarefa" placeholder="Nome da Tarefa" value="{{ old('tarefa') }}"
                    class="input input-bordered w-full max-w-xs {{ $errors->has('tarefa') ? 'border border-red-500' : '' }}">
                @error('tarefa')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <fieldset>
                <legend class="label">Categoria</legend>
                <select name="categoria_id" class="select select-bordered w-full max-w-xs {{ $errors->has('categoria_id') ? 'border border-red-500' : '' }}">
                    <option disabled selected>Escolhe uma Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nomeCategoria }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <fieldset>
                <legend class="label">Descrição</legend>
                <textarea name="descricao" placeholder="Descrição da Tarefa" class="textarea textarea-bordered w-full max-w-xs {{ $errors->has('descricao') ? 'border border-red-500' : '' }}">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <button type="submit" class="btn">Criar Tarefa</button>
        </div>
    </form>
</x-layout>
