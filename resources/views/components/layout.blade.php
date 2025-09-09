<!DOCTYPE html>
<html lang="es" class="h-full bg-white text-gray-700">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($title))
        <title>ksergio.com | {{ $title }}</title>
    @else
        <title>ksergio.com</title>
    @endif

    @if(isset($metaDescription))
        <meta name="description" content="{{ $metaDescription }}">
    @else
        <meta name="description"
            content="Blog de programación fullstack donde comparto experiencias y proyectos en frontend, backend, DevOps y administración de sistemas. Me apasiona Linux, desarrollo web y software, y compagino trabajo y estudios mientras aprendo y enseño sobre tecnología.">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="h-full w-full">
    @unless($hideNavbar)
        <x-navbar></x-navbar>
    @endunless
    {{ $slot }}
</body>

</html>