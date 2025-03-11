<div class="mt-8">
    <!-- Image -->
    <a href="{{ route('movie.show') }}">
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
