<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- PROJETS --}}
                <a href="{{ route('projects.index') }}"
                   class="block bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 hover:ring-2 hover:ring-indigo-500 transition">

                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                        🧱 Projets
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300">
                        Gérer les projets affichés sur la vitrine :
                        ajout, modification, images, liens.
                    </p>
                </a>

                {{-- RATES --}}
                <a href="{{ route('rates.index') }}"
                   class="block bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 hover:ring-2 hover:ring-indigo-500 transition">

                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                        💬 Avis / Ils me font confiance
                    </h3>

                    <p class="text-gray-600 dark:text-gray-300">
                        Gérer les avis clients, avatars, textes et dates.
                    </p>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>
