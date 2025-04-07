<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Movie Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-lg">

                <!-- Hero Section (Movie Banner) -->
                <div class="relative w-full h-[500px]">
                    <div class="absolute inset-0 bg-black bg-opacity-60"></div> <!-- Overlay -->

                    <img src="https://image.tmdb.org/t/p/original{{ $movie[0]['backdrop_path'] }}"
                         alt="{{ $movie[0]['title'] }}"
                         class="w-full h-full object-cover opacity-0 transition-opacity duration-700"
                         onload="this.style.opacity=1;"
                         onerror="this.onerror=null; this.src='/images/image-not-found.jpg';">

                    <!-- Title & Rating -->
                    <div class="absolute bottom-8 left-8 text-white z-10">
                        <h1 class="text-4xl font-extrabold drop-shadow-lg">{{ $movie[0]['title'] }}</h1>
                        <div class="flex items-center mt-2">
                            <p class="text-lg bg-yellow-500 text-black px-3 py-1 rounded-full">⭐ {{ $movie[0]['vote_average'] }}/10</p>
                            <p class="ml-4 text-lg">{{ \Carbon\Carbon::parse($movie[0]['release_date'])->format('F d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Movie Details Section -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-gray-300 text-lg mt-2 leading-relaxed">
                        {{ $movie[0]['overview'] }}
                    </p>

                    <!-- Watch Trailer Button -->
                    <div class="mt-6">
                        @if(isset($trailer))
                            <a href="https://www.youtube.com/watch?v={{ $trailer['key'] }}"
                               target="_blank"
                               class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg text-lg inline-flex items-center transition-transform transform hover:scale-105">
                                🎬 Watch Trailer
                            </a>
                        @else
                            <p class="text-gray-400">No official trailer available.</p>
                        @endif
                    </div>
                </div>

                <!-- More Like This -->
                <div class="mt-8 p-6">
                    <h2 class="text-2xl font-semibold mb-4 text-white">🎥 More Like This</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($related_movies as $m)
                            <a href="{{ route('home.movie.show', $m['id']) }}"
                               class="relative group bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                                <img src="https://image.tmdb.org/t/p/w500{{ $m['poster_path'] }}"
                                     alt="{{ $m['title'] }}"
                                     class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-105">
                                <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-70">
                                    <h4 class="text-white font-bold text-lg">{{ $m['title'] }}</h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
