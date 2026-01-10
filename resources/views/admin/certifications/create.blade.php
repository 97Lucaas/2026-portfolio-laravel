<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter une certification
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="mb-4 rounded bg-red-600 text-white p-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12 text-white">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <form method="POST"
                  action="{{ route('admin.certifications.store') }}"
                  enctype="multipart/form-data"
                  class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Titre</label>
                    <input type="text" name="title" required
                           value="{{ old('title') }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Description courte</label>
                    <input type="text" name="short_description" required
                           value="{{ old('short_description') }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Date d’obtention</label>
                    <input type="date" name="obtained_at" required
                           value="{{ old('obtained_at') }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Lien public (Credly, PDF…)</label>
                    <input type="url" name="external_url"
                           value="{{ old('external_url') }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Logo</label>
                    <input type="file" name="logo" class="mt-1 block w-full">
                </div>

                <div class="flex justify-end">
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500">
                        Créer
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
