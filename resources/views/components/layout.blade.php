@props([
    'title' => 'Tarefas',
    'categorias' => collect(),
])
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            transition: all 0.3s ease;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="flex min-h-screen">
        <ul class="menu bg-base-200 rounded-box w-56">
            <h2 class="menu-title">Gestão de Tarefas</h2>
            <li><a>Item 1</a></li>
            <li>
                <details open>
                    <summary>Categorias</summary>
                    <ul>
                        @foreach ($categorias as $categoria)
                            <li><a>{{ $categoria->nomeCategoria }}</a></li>
                        @endforeach
                    </ul>
                </details>
            </li>
            <li><a>Item 3</a></li>
        </ul>
        <div class="flex-1 p-4 overflow-auto">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
