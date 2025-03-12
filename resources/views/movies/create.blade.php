<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Add Movie') }}
    </h2>
</x-slot>

<div class="py-12">
    <form id="deviceForm" action="{{ route('store.movie') }}" method="POST">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @csrf
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-input-label for="title" value="Title*" />
                <x-text-input id="title" name="title" class="mt-1 block w-full" />
            </div>

            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-input-label for="description" value="Description*" />
                <x-text-input id="description" name="description" class="mt-1 block w-full" />
            </div>

            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-input-label for="genre" value="Genre*" />
                <x-text-input id="genre" name="genre" class="mt-1 block w-full" />
            </div>

            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-input-label for="rating" value="Rating*" />
                <x-text-input id="rating" name="rating" class="mt-1 block w-full" />
            </div>

            <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-input-label for="cover_photo" value="Cover Photo*" />
                <x-text-input type="file" id="cover_photo" name="cover_photo" class="mt-1 block w-full"/>
            </div>

            <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-start">
                    <x-primary-button class="mt-4">Add Movie</x-primary-button>
            </div>
        </div>
    </div>
</div>
</form>
</x-app-layout>
