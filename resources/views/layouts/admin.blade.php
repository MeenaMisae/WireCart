<!DOCTYPE html>
<html lang="en" data-theme="light" class="font-questrial">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getenv('APP_NAME') }} | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-[15rem] shadow-lg h-screen">
        <div class="px-6">
            <div class="flex items-center mt-9 justify-between">
                <h1 class="text-3xl">wire: cotton</h1>
                <span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 15L7.5 10L12.5 5" stroke="#292929" stroke-width="1.66667" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
            <div class="mt-14">
                <ul class="space-y-8">
                    <li class="text-xl">
                        Início
                    </li>
                    <li class="text-xl">
                        Produtos
                    </li>
                    <li class="text-xl">
                        Categorias
                    </li>
                    <li class="text-xl">
                        Pedidos
                    </li>
                    <li class="text-xl">
                        Clientes
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="flex flex-col drawer-content" x-data="{ showNavbar: true }">
            <div class="w-full navbar" x-show="showNavbar" x-transition.duration.200ms>
                @include('components.admin.hamburguer-menu')
                <div class="flex-none hidden lg:block menu-container">
                    <ul class="menu menu-horizontal w-[99vw]">
                        @include('components.admin.navbar')
                    </ul>
                </div>
            </div>
            @yield('content')
        </div>
        @include('components.admin.drawer-side')
    </div> --}}
    @yield('js')
</body>

</html>
