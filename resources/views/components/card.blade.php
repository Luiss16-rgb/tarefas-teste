@props([
    'nome' => 'Card Title',
    'descricao' => 'Aqui situa-se a descrição da tarefa',
    'bg' => '',
    'tipo' => 'card-tarefa',
    'data' => '',
    'estado' => 'porIniciar',
    'categoria' => null
])
<div class="card {{ $estado }} bg-base-100 w-full shadow-sm {{ $bg }} {{ $tipo }} rounded-tl-none">
    @if($categoria)
        <span class="text-xs uppercase opacity-80 tracking-wider block pl-2">
            {{ $categoria }}
        </span>
    @endif
    <div class="card-body cursor-pointer pt-1">
        <div>
            <h2 class="card-title">{{ $nome }}</h2>
            <p class="text-xs text-gray-500">{{ $data }}</p>
        </div>
        <p class="break-words overflow-hidden ">{{ $descricao }}</p>
        <div {{ $attributes->merge(['class' => 'card-actions justify-end']) }}>
            {{ $slot }}
        </div>
    </div>
</div>
