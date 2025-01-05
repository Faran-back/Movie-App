@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <x-orange-heading>Popular Movies</x-orange-heading>
    </div>

    <div class=" mt-5 grid grid-cols-5 gap-8">
        <!-- Movie Item -->
        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/parasite.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Parasite</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/frozen2.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Frozen II</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/joker.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Joker</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/sonic.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Sonic Mega Boom</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/25th hour.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">25th Hour</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/Fight Club.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Fight Club</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/Jurrasic park.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Jurrasic Park</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/Rey Leon.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Rey Leon</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/The Godfather.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">The Godfather</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/The Vault.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">The Vault</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>


    </div>


    <x-orange-heading>Now playing</x-orange-heading>

    <div class=" mt-5 grid grid-cols-4 gap-8">
        <!-- Movie Item -->
        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/parasite.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Parasite</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/frozen2.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Frozen II</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/Jurrasic park.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Jurrasic Park</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <!-- Image -->
            <a href="#">
                <img
                    src="{{ asset('images/Rey Leon.jpg') }}"
                    class="transition ease-in-out duration-300 opacity-75 hover:opacity-100"
                    alt="parasite"
                >
            </a>

            <!-- Movie Details -->
            <div class="mt-2">
                <!-- Title -->
                <a href="#" class="hover:text-gray-700 text-lg font-semibold">Rey Leon</a>

                <!-- Rating and Release Date -->
                <div class="flex items-center mt-2 text-gray-400">
                    <img src="{{ asset('images/star.png') }}" alt="star" class="w-4">
                    <span class="ml-2">4.8</span>
                    <span class="mx-2">|</span>
                    <span>Apr 1, 2024</span>
                </div>

                <!-- Genres -->
                <div class="text-gray-400">
                    <span>Comedy, Fantasy, Thriller</span>
                </div>
            </div>
        </div>

</div>
@endsection
