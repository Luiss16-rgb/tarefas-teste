<x-layout title="Criar Tarefa" :categorias="$categorias" :totalTarefas="$totalTarefas" flex="flex justify-center">
    @if (session('success'))
        <div class="alert alert-success mb-4 text-white !p-2">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('tarefas.index') }}">
        <i class="fi fi-rr-arrow-small-left !text-[35px] !p-2"></i>
    </a>
    
    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <div class="flex items-center flex-col gap-4 justify-center">
            <div class="flex flex-col items-center w-1/3 justify-center">
                <legend class="label flex self-start">Título</legend>
                <input type="text" name="tarefa" placeholder="Nome da Tarefa" value="{{ old('tarefa') }}"
                    class="input input-bordered w-full {{ $errors->has('tarefa') ? 'border border-red-500' : '' }}">
                @error('tarefa')
                    <p class="text-red-500 text-sm mt-1 flex self-start">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col items-center w-1/3 justify-center">
                <legend class="label flex self-start">Categoria</legend>
                <select name="categoria_id" class="select select-bordered w-full {{ $errors->has('categoria_id') ? 'border border-red-500' : '' }}">
                    <option disabled selected>Escolhe uma Categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nomeCategoria }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-red-500 text-sm mt-1 flex self-start">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col items-center w-1/3 justify-center">
                <legend class="label flex self-start">Descrição</legend>
                <textarea name="descricao" placeholder="Descrição da Tarefa" class="textarea textarea-bordered w-full {{ $errors->has('descricao') ? 'border border-red-500' : '' }}">{{ old('descricao') }}</textarea>
                @error('descricao')
                    <p class="text-red-500 text-sm mt-1 flex self-start">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col items-end w-1/3 justify-center">
                <button type="submit" class="btn btn-primary">Criar Tarefa</button>
            </div>
        </div>
    </form>
</x-layout>
