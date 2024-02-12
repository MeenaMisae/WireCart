<!DOCTYPE html>
<html lang="en" data-theme="light" class="font-quick-sand">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>{{ getenv('APP_NAME') }} | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <div class="w-full navbar">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="px-2 mx-2 lg:hidden w-full flex justify-center">
                    <a href="{{ route('admin.index') }}">
                        <h1 class="text-3xl font-light tracking-[0.3rem]">wire:cotton</h1>
                    </a>
                </div>
                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal w-[99vw]">
                        @include('components.admin.navbar')
                    </ul>
                </div>
            </div>
            @yield('content')
        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 min-h-full bg-base-200">
                <li>
                    <a class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">produtos</a>
                </li>
                <li>
                    <a class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">categorias</a>
                </li>
                <li>
                    <a class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">subcategorias</a>
                </li>
                <li>
                    <a class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">pedidos</a>
                </li>
                <li>
                    <a class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">clientes</a>
                </li>
            </ul>
        </div>
    </div>

    @yield('js')
</body>

</html>
