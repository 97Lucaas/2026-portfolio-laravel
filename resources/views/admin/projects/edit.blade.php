<link rel="stylesheet" href="{{ asset('css.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier le projet
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
                  action="{{ route('admin.projects.update', $project) }}"
                  enctype="multipart/form-data"
                  class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium">Titre</label>
                    <input type="text" name="title" value="{{ $project->title }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" rows="5"
                              class="mt-1 w-full rounded-md dark:bg-gray-900">{{ $project->description }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium">Contenu</label>
                    <textarea name="content" rows="5"
                              class="mt-1 w-full rounded-md dark:bg-gray-900">{{ $project->content }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium">Date</label>
                    <input type="date" name="date" value="{{ $project->date }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Lien</label>
                    <input type="url" name="link" value="{{ $project->link }}"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                {{-- Images --}}
                <div>
                    <label class="block text-sm font-medium mb-2">Images du projet</label>

                    {{-- input multi --}}
                    <input
                        type="file"
                        id="imagesInput"
                        name="images[]"
                        accept="image/*"
                        multiple
                        class="mt-1 block w-full"
                    >

                    {{-- index cover --}}
                    <input type="hidden" name="main_image_index" id="mainImageIndex">
                    <input type="hidden" name="deleted_images" id="deletedImages">

                    {{-- images existantes --}}
                    <div id="existingImages" class="preview-grid mt-4">
                        @foreach($project->images as $img)
                            <div
                                class="preview-card {{ $img->path === $project->img_pic ? 'is-cover' : '' }}"
                                data-id="{{ $img->id }}"
                                data-existing="1"
                            >
                                <img src="{{ asset('storage/'.$img->path) }}">

                                <button
                                    type="button"
                                    class="preview-del"
                                    data-action="delete-existing"
                                    data-id="{{ $img->id }}"
                                >×</button>

                                @if($img->path === $project->img_pic)
                                    <div class="cover-badge">Image couverture</div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    {{-- preview nouvelles images --}}
                    <div id="imagesPreview" class="preview-grid mt-4"></div>
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

<script>
(() => {
    const input = document.getElementById('imagesInput');
    const preview = document.getElementById('imagesPreview');
    const existing = document.getElementById('existingImages');
    const mainHidden = document.getElementById('mainImageIndex');
    const deletedHidden = document.getElementById('deletedImages');
    const form = input.closest('form');

    let files = [];
    let cover = {
        type: 'existing', // existing | new
        index: null,
        id: null
    };
    let deleted = [];

    // INIT cover existante
    const currentCover = existing.querySelector('.is-cover');
    if (currentCover) {
        cover.type = 'existing';
        cover.id = currentCover.dataset.id;
    }

    // ================= NEW IMAGES =================
    const syncInput = () => {
        const dt = new DataTransfer();
        files.forEach(f => dt.items.add(f));
        input.files = dt.files;
    };

    const renderNew = () => {
        preview.innerHTML = '';
        files.forEach((file, i) => {
            const card = document.createElement('div');
            card.className = 'preview-card' + (
                cover.type === 'new' && cover.index === i ? ' is-cover' : ''
            );
            card.dataset.index = i;

            const img = document.createElement('img');
            const r = new FileReader();
            r.onload = () => img.src = r.result;
            r.readAsDataURL(file);

            const del = document.createElement('button');
            del.type = 'button';
            del.className = 'preview-del';
            del.textContent = '×';

            if (cover.type === 'new' && cover.index === i) {
                card.innerHTML += `<div class="cover-badge">Image couverture</div>`;
            }

            card.append(img, del);
            preview.appendChild(card);
        });
    };

    input.addEventListener('change', () => {
        files = Array.from(input.files);
        if (files.length && cover.index === null && cover.type !== 'existing') {
            cover = { type: 'new', index: 0 };
        }
        syncInput();
        renderNew();
    });

    // =============== CLICS ===================
    document.addEventListener('click', e => {
        const card = e.target.closest('.preview-card');
        if (!card) return;

        // DELETE EXISTING
        if (e.target.dataset.action === 'delete-existing') {
            deleted.push(card.dataset.id);
            card.remove();
            deletedHidden.value = JSON.stringify(deleted);

            if (cover.type === 'existing' && cover.id === card.dataset.id) {
                cover = { type: null };
            }
            return;
        }

        // DELETE NEW
        if (e.target.classList.contains('preview-del')) {
            const i = Number(card.dataset.index);
            files.splice(i, 1);
            if (cover.type === 'new' && cover.index === i) {
                cover = { type: null };
            }
            syncInput();
            renderNew();
            return;
        }

        // SET COVER
        document.querySelectorAll('.preview-card').forEach(c => c.classList.remove('is-cover'));
        card.classList.add('is-cover');

        if (card.dataset.existing) {
            cover = { type: 'existing', id: card.dataset.id };
        } else {
            cover = { type: 'new', index: Number(card.dataset.index) };
        }
    });

    // ================= SUBMIT =================
    form.addEventListener('submit', e => {
        if (!cover.type) {
            e.preventDefault();
            alert('Sélectionne une image de couverture.');
            return;
        }

        mainHidden.value = JSON.stringify(cover);
        deletedHidden.value = JSON.stringify(deleted);
    });
})();
</script>
