@props([
    'title' => 'Tarefas',
    'flex' => '',
    'bgHover' => '#f0f0f0',
    'categorias' => [],
    'totalTarefas' => '',
])
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>{{ $title }}</title>
    <style>
        * {
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: row;
            margin: 0;
            padding: 0;
        }

        .criarNovo:hover {
            background-color: #fde047;
        }

        .porIniciar:hover {
            background-color: #f0f0f0;
        }

        .emCurso:hover {
            background-color: #fde047;
        }

        .concluida:hover {
            background-color: #4ade80;
        }

        .btnHover:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>

<body {{ $flex }}>
    <div class="flex min-h-screen">
        <ul class="menu bg-base-200 rounded-box w-56">
            <h2 class="menu-title">Gestão de Tarefas</h2>
            <form action="{{ route('tarefas.index') }}" method="GET" class="w-full flex flex-row">
                <label class="input outline-none">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                            stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input type="search" name="search" placeholder="Pesquisar" value="{{ request('search') }}" />
                </label>
            </form>
            <br>
            <li><a href="{{ route('tarefas.create') }}"
                    class="{{ Route::is('tarefas.create') ? 'menu-active' : '' }}"><i
                        class="fi fi-rr-add flex items-center"></i>Criar Tarefa</a>
            </li>
            <li>
                <details closed>
                    <summary><i class="fi fi-rr-folder-plus-circle flex items-center"></i>Criar Categoria</summary>
                    <ul>
                        <li>
                            <form action="{{ route('categorias.store') }}" method="POST" class="pr-1 w-full block">
                                @csrf
                                <input type="text" name="nomeCategoria" placeholder="Categoria"
                                    class="input input-sm outline-none !w-full" required />

                            </form>
                        </li>
                    </ul>

                </details>
            </li>
            <br>
            <li><a href="{{ route('tarefas.index') }}"
                    class="font-semibold {{ Route::is('tarefas.index') && !request('filtro') && !request('categoria_id') ? 'menu-active' : '' }}"><i
                        class="fi fi-rr-list flex items-center"></i>Ver Todos ({{ $totalTarefas }})</a></li>
            <br>
            <li>
                <details open>
                    <summary><i class="fi fi-rr-clock flex items-center"></i>Estados</summary>
                    <ul>
                        <li><a href="{{ route('tarefas.index', ['filtro' => 'nao_concluidas']) }}"
                                class="{{ request('filtro') == 'nao_concluidas' ? 'menu-active' : '' }}">Não
                                Concluídas</a></li>
                        <li><a href="{{ route('tarefas.index', ['filtro' => 'por_iniciar']) }}"
                                class="{{ request('filtro') == 'por_iniciar' ? 'menu-active' : '' }}">Por Iniciar</a>
                        </li>
                        <li><a href="{{ route('tarefas.index', ['filtro' => 'em_curso']) }}"
                                class="{{ request('filtro') == 'em_curso' ? 'menu-active' : '' }}">Em Curso</a></li>
                        <li><a href="{{ route('tarefas.index', ['filtro' => 'concluidas']) }}"
                                class="{{ request('filtro') == 'concluidas' ? 'menu-active' : '' }}">Concluídas</a>
                        </li>
                    </ul>
                </details>
            </li>
            <li>
                <details open>
                    <summary><i class="fi fi-rr-folder flex items-center"></i>Categorias</summary>
                    <ul>
                        <li>
                            <a href="{{ route('categorias.index') }}">Ver Categorias</a>
                        </li>
                        @foreach ($categorias as $categoria)
                            <li>
                                <a href="{{ route('categorias.index', ['categoria_id' => $categoria->id]) }}"
                                    class="{{ request('categoria_id') == $categoria->id ? 'menu-active' : '' }}">
                                    {{ $categoria->nomeCategoria }} ({{ $categoria->tarefas_count }})
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </details>
            </li>
        </ul>
    </div>
    <div class="flex-1 p-4 overflow-auto aling-items">
        {{ $slot }}
    </div>
</body>

</html>
