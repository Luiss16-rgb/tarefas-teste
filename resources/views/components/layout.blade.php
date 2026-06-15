@props([
    'title' => 'Tarefas',
])
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>{{ $title }}</title>
    <style>
        * {
            margin: 0;
        }

        .menu {
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="flex min-h-screen">
        <ul class="menu bg-base-200 rounded-box w-56 bg-[#000080] text-white">
            <li>
                <h2 class="menu-title text-white">Gestão de Tarefas</h2>
                <ul>
                    <li><a>Item 1</a></li>
                    <li><a>Item 2</a></li>
                    <li><a>Item 3</a></li>
                </ul>
            </li>
        </ul>
    </div>
    {{ $slot }}
</body>

</html>
