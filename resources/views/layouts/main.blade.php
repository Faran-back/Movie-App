<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>MovieHive</title>
</head>
<body class="font sans bg-gray-900 px-4 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <ul class="flex items-center justify-between">
            <li class="flex items-center gap-2">
                <img src="{{ asset('images/clapperboard.png') }}" alt="Logo" class="w-5 filter invert sepia saturate-200 hue-rotate-45 brightness-125">
                <span class="text-sm font-bold text-blue-400">MovieHive</span>
            </li>
            <li class="ml-16 hover:text-gray-300 font-bold text-sm">
                <a href="#">Movies</a>
            </li>
            <li class="ml-6 hover:text-gray-300 font-bold text-sm">
                <a href="#">TV Shows</a>
            </li>
            <li class="ml-6 hover:text-gray-300 font-bold text-sm">
                <a href="#">Actors</a>
            </li>
            </ul>

            <div class="flex items-center">
                <div class="relative">
                    <!-- Input field with padding to accommodate the icon -->
                    <input
                        type="text"
                        placeholder="Search"
                        class="bg-gray-800 rounded-full px-4 py-0.9 pl-10 text-white"
                    >
                    <!-- Positioned icon -->
                    <img
                        src="{{ asset('images/search.png') }}"
                        alt="Search Icon"
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 filter invert sepia saturate-200 hue-rotate-45 brightness-125"
                    >
                </div>

                <div class="ml-4">
                    <a href="#">
                        <img src="{{ asset('images/my_vector.jpg') }}" class="rounded-full w-8 h-8" alt="Faran Naeem">
                    </a>
                </div>
            </div>

        </div>

    </nav>
    @yield('content')
</body>
</html>
