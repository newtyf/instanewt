<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? '' }}" />
</head>

<body id="app" class="bg-black h-screen flex">

    @auth
        <x-common.aside />
    @endauth

    {{-- ? with if-else
    @if (auth()->check())
        <x-common.aside />
    @else
        <nav class="p-4 flex justify-between">
            <ul>
                <li class="text-white"><a href="{{ route('feed') }}">instanew</a></li>
            </ul>
            <ul class="flex">
                <li class="text-white">
                    <a href="{{ route('login') }}" class="ml-4 bg-blue-500 hover:bg-blue-600 duration-200 rounded-md px-2 py-1">Log
                        in</a>
                </li>
                <li class="text-blue-500">
                    <a href="{{ route('register') }}"
                        class="ml-4 duration-200 rounded-md px-2 py-1 hover:bg-blue-950">Sign Up</a>
                </li>
            </ul>
        </nav>
    @endif --}}
    <main class="flex flex-col w-full h-full">
        @guest
            <x-common.topbar />
        @endguest
        {{ $slot }}
        @auth
            <x-common.bottonbar />
        @endauth
    </main>

</body>

</html>
