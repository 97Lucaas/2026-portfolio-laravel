<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Avis / Ils me font confiance
        </h2>
    </x-slot>

    <div class="py-12 text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('admin.rates.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-md text-white text-xs font-semibold uppercase hover:bg-indigo-500">
                    ➕ Ajouter un avis
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left">Nom</th>
                            <th class="px-6 py-3 text-left">Contexte</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($rates as $rate)
                            <tr class="border-t">
                                <td class="px-6 py-4">{{ $rate->name }}</td>
                                <td class="px-6 py-4">{{ $rate->meeting }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($rate->date)->format('Y') }}
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('rates.edit', $rate) }}" class="text-indigo-600">✏️</a>
                                    <form method="POST" action="{{ route('rates.destroy', $rate) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                    Aucun avis
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
