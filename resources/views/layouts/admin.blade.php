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
    </div>
    @yield('js')
</body>

</html>
