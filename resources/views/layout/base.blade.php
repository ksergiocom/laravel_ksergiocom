<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ksergio.com</title>
    @vite(['resources/css/app.css'])
    @stack('styles')

</head>

<body class="h-full w-full bg-gray-100 text-gray-800">
    <main>
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>