<x-layout title="Criar Categoria" flex="flex justify-center" :categorias="$categorias">
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="flex align-items flex-col gap-4 justify-center">
            <fieldset>
                <legend class="label">Categoria</legend>
                <input type="text" name="nomeCategoria" placeholder="Nome da Categoria"
                    class="input input-bordered w-full max-w-xs {{ $errors->has('nomeCategoria') ? 'border border-red-500' : '' }}">
                @error('nomeCategoria')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>
            <button type="submit" class="btn">Criar Categoria</button>
        </div>
    </form>
</x-layout>
