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
    <div class="h-screen w-screen">
        @include('components.admin.navbar')
        @yield('content')
    </div>
    @yield('js')
</body>

</html>
