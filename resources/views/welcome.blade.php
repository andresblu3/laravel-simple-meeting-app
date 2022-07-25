<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reuniones Virtuales - Andres A.</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center p-5">
                <h1 class="text-2xl">Reuniones Virtuales</h1>
            </div>

            <div class="mt-5 bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="min-w-full p-5">
                    @if (Auth::check())
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="rounded-full w-12 h-12"
                                    src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortFlat&accessoriesType=Blank&hairColor=Blonde&facialHairType=Blank&clotheType=ShirtVNeck&clotheColor=Heather&eyeType=Default&eyebrowType=RaisedExcited&mouthType=Smile&skinColor=Light"
                                    alt="avatar">
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs leading-5 text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="flex flex-shrink-0">
                                <a href="{{ route('dashboard') }}"
                                    class="inline-block text-sm leading-5 text-gray-700 hover:text-gray-900 focus:outline-none focus:shadow-outline px-5">
                                    Ir al Escritorio
                                </a>
                            </div>
                            <div class="flex flex-shrink-0">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();this.closest('form').submit();"
                                        class="inline-block text-sm leading-5 text-white bg-gray-900 hover:text-white focus:outline-none focus:shadow-outline p-2 rounded-md">
                                        Cerrar Sesión
                                    </a>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex">
                            <div class="flex mx-auto">
                                <a href="{{ route('login') }}"
                                    class="inline-block text-sm leading-5 bg-gray-900 text-white rounded-md p-2 focus:outline-none focus:shadow-outline">
                                    Iniciar sesión
                                </a>
                                <a href="{{ route('register') }}"
                                    class="inline-block
                                    text-sm leading-5 bg-gray-900 text-white rounded-md p-2 focus:outline-none
                                    focus:shadow-outline ml-2">Registrarme</a>
                            </div>
                        </div>
                    @endif

                            </div>
                        </div>

                </div>
            </div>
</body>

</html>
