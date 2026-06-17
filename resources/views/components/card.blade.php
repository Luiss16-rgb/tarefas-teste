@props([
    'nome' => 'Card Title',
    'descricao' => 'Aqui situa-se a descrição da tarefa',
])
<div class="card bg-base-100 w-full shadow-sm">
    <div class="card-body">
        <h2 class="card-title">{{ $nome }}</h2>
        <p class="break-words overflow-hidden">{{ $descricao }}</p>
        <div {{ $attributes->merge(['class' => 'card-actions justify-end']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
