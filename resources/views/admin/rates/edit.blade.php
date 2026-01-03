<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier l’avis
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
                  action="{{ route('rates.update', $rate) }}"
                  enctype="multipart/form-data"
                  class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium">Nom</label>
                    <input type="text" name="name" value="{{ $rate->name }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Contexte</label>
                    <input type="text" name="meeting" value="{{ $rate->meeting }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Avis</label>
                    <textarea name="description" rows="4"
                              class="mt-1 w-full rounded-md dark:bg-gray-900">{{ $rate->description }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium">Date</label>
                    <input type="date" name="date" value="{{ $rate->date }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                @if($rate->avatar)
                    <div>
                        <label class="block text-sm font-medium">Avatar actuel</label>
                        <img src="{{ asset('storage/'.$rate->avatar) }}"
                             class="mt-2 w-24 h-24 rounded-full object-cover">
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-medium">Changer l’avatar</label>
                    <input type="file" name="avatar" class="mt-1 block w-full">
                </div>

                <div class="flex justify-end">
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500">
                        Mettre à jour
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
