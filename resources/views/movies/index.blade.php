<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Movies') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <!-- Movie Card (Reusable) -->
                        @foreach ($movies['results'] as $movie)
                        <a href="{{ route('movie.show', $movie['id']) }}">
                            <div class="relative group bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                                     alt="{{ $movie['title'] }}"
                                     class="w-full h-100 object-cover transition-transform duration-300 group-hover:scale-110">
                                <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-60">
                                    <h4 class="text-white font-bold text-lg">{{ $movie['title'] }}</h4>
                                </div>
                            </div>
                        @endforeach
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
