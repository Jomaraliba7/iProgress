<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
                {{ __('My Projects') }}
            </h1>
            <div class="flex justify-between items-center">
            <button><h1 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
                {{ __('Create Project') }}
            </h1></button>
        </div>
        </div>
    </x-slot>

    <!-- Add your content here -->

</x-app-layout>