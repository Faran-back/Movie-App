<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Discover') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Featured Movie (Large Card) -->
            <div class="bg-gray-900 text-white overflow-hidden shadow-lg rounded-lg relative group mb-8">
                <div class="relative w-full h-96">
                    <img src="https://image.tmdb.org/t/p/original{{ $featured_movie['poster_path'] }}"
                         alt="Featured Movie"
                         class="absolute inset-0 w-full h-full object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-bold">{{ $featured_movie['title'] }}</h3>
                    <p class="text-gray-300 text-sm mt-2">
                        {{ $featured_movie['overview'] }}
                    </p>
                    <a href="https://www.youtube.com/watch?v={{  }}" class="inline-block mt-3 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Watch Now
                    </a>
                </div>
            </div>

            <!-- Movie Grid (Small Cards) -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($movies as $movie)
                    <div class="relative bg-gray-800 rounded-lg overflow-hidden shadow-lg group">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                             alt="{{ $movie['title'] }}"
                             class="w-full h-100 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4">
                            <h4 class="text-white font-bold text-lg">{{ $movie['title'] }}</h4>
                            <div class="flex items-center text-yellow-400 mt-1">
                                ⭐ {{ number_format($movie['vote_average'], 1) }}/10
                            </div>
                            <p class="text-gray-300 text-sm mt-2">
                                {{ Str::limit($movie['overview'], 100, '...') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Section for Top TV Shows -->
            <section class="mt-8">
                <h2 class="text-2xl font-semibold mb-5 text-gray-900 dark:text-white">Top TV Shows</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($tvshows['results'] as $tvshow)
                        <div class="relative bg-gray-800 rounded-lg overflow-hidden shadow-lg group">
                            <img src="https://image.tmdb.org/t/p/w500{{ $tvshow['poster_path'] }}"
                                alt="{{ $tvshow['name'] }}"
                                class="w-full h-100 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4">
                                <h4 class="text-white font-bold text-lg">{{ $tvshow['name'] }}</h4>
                                <div class="flex items-center text-yellow-400 mt-1">
                                    ⭐ {{ number_format($tvshow['vote_average'], 1) }}/10
                                </div>
                                <p class="text-gray-300 text-sm mt-2">
                                    {{ Str::limit($tvshow['overview'], 100, '...') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        <!-- Section For Now Playing -->
        <section class="mt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-2xl font-semibold mb-5 text-gray-900 dark:text-white">Now Playing</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($now_playing_content as $playing)
                        <a href="{{ route('home.movie.show', $playing['id']) }}" class="relative bg-gray-800 rounded-lg overflow-hidden shadow-lg group block">
                            <img src="https://image.tmdb.org/t/p/w500{{ $playing['poster_path'] }}"
                                 alt="{{ $playing['title'] }}"
                                 class="w-full h-100 object-cover transition-transform duration-300 group-hover:scale-105">

                            <div class="absolute inset-0 bg-black bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4">
                                <h4 class="text-white font-bold text-lg">{{ $playing['title'] }}</h4>
                                <div class="flex items-center text-yellow-400 mt-1">
                                    ⭐ {{ number_format($playing['vote_average'], 1) }}/10
                                </div>
                                <p class="text-gray-300 text-sm mt-2">
                                    {{ Str::limit($playing['overview'], 100, '...') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</x-app-layout>
