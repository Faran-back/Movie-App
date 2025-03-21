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
                <img src="https://image.tmdb.org/t/p/w500{{ $featured_movie['poster_path'] }}"
                     alt="Featured Movie"
                     class="h-96 w-full object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h3 class="text-2xl font-bold">{{ $featured_movie['title'] }}</h3>
                    <p class="text-gray-300 text-sm mt-2">
                        {{ $featured_movie['overview'] }}
                    </p>
                    <a href="#" class="inline-block mt-3 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Watch Now
                    </a>
                </div>
            </div>



            <!-- Movie Grid (Small Cards) -->
            <h2 class="text-2xl font-semibold mb-5 text-gray-900 dark:text-white">Top Movies</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Movie Card (Reusable) -->
                @foreach ($movies as $movie)
                    <div class="relative group bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                             alt="{{ $movie['title'] }}"
                             class="w-full h-100 object-cover transition-transform duration-300 group-hover:scale-110">
                        <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-60">
                            <h4 class="text-white font-bold text-lg">{{ $movie['title'] }}</h4>
                        </div>
                    </div>
                    @endforeach
            </div>


            {{-- Section for Top Tv Shows --}}

            <section class="mt-8">
                <h2 class="text-2xl font-semibold mb-5 text-gray-900 dark:text-white">Top Tv Shows</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Movie Card (Reusable) -->
                    @foreach ($tvshows['results'] as $tvshow)
                        <div class="relative group bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                            <img src="https://image.tmdb.org/t/p/w500{{ $tvshow['poster_path'] }}"
                                alt="{{ $tvshow['name'] }}"
                                class="w-full h-100 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-60">
                                <h4 class="text-white font-bold text-lg">{{ $tvshow['name'] }}</h4>
                            </div>
                        </div>
                        @endforeach
                </div>
            </section>


        </div>

        {{-- Section For Now Playing --}}

        <section class="mt-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-2xl font-semibold mb-5 text-gray-900 dark:text-white">Now Playing</h2>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($now_playing_content as $playing)
                        <div class="relative group bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                            <img src="https://image.tmdb.org/t/p/w500{{ $playing['poster_path'] }}"
                                 alt="{{ $playing['title'] }}"
                                 class="w-full h-100 object-cover transition-transform duration-300 group-hover:scale-110">
                            <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-60">
                                <h4 class="text-white font-bold text-lg">{{ $playing['title'] }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


    </div>




</x-app-layout>
