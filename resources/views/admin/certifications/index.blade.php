<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Certifications
        </h2>
    </x-slot>

    <div class="py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('admin.certifications.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-md text-white text-xs font-semibold uppercase hover:bg-indigo-500">
                    ➕ Ajouter une certification
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left">Titre</th>
                            <th class="px-6 py-3 text-left">Description</th>
                            <th class="px-6 py-3 text-left">Année</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($certifications as $certification)
                            <tr class="border-t">
                                <td class="px-6 py-4 font-medium">
                                    {{ $certification->title }}
                                </td>

                                <td class="px-6 py-4 opacity-80">
                                    {{ $certification->short_description }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $certification->obtained_at->format('Y') }}
                                </td>

                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('admin.certifications.edit', $certification) }}"
                                       class="text-indigo-600">✏️</a>

                                    <form method="POST"
                                          action="{{ route('admin.certifications.destroy', $certification) }}"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600"
                                                onclick="return confirm('Supprimer cette certification ?')">
                                            🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                    Aucune certification
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
