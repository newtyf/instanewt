<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>{{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? '' }}" />
</head>

<body class="bg-black w-vw h-screen flex justify-center">
    <main class="w-full h-full flex flex-col max-w-screen-md">
        {{ $slot }}
        <footer class="flex justify-center h-12 text-white">
            <h2>Instanewt</h2>
        </footer>
    </main>

    <script>
        document.addEventListener('dragstart', function(evt) {
            evt.preventDefault();
        });
    </script>

</body>

</html>
