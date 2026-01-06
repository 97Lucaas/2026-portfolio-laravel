<link rel="stylesheet" href="{{ asset('css.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ajouter un projet
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
                  action="{{ route('admin.projects.store') }}"
                  enctype="multipart/form-data"
                  class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Titre</label>
                    <input type="text" name="title" required
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" rows="5"
                              class="mt-1 w-full rounded-md dark:bg-gray-900"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium">Contenu</label>
                    <textarea name="content" rows="5"
                              class="mt-1 w-full rounded-md dark:bg-gray-900"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium">Date</label>
                    <input type="date" name="date" required
                           class="mt-1 w-full rounded-md dark:bg-gray-900 focus:border-indigo-500 focus:ring-indigo-500 [&::-webkit-calendar-picker-indicator]:invert">
                </div>

                <div>
                    <label class="block text-sm font-medium">Lien</label>
                    <input type="url" name="link"
                           class="mt-1 w-full rounded-md dark:bg-gray-900">
                </div>

                <div>
                    <label class="block text-sm font-medium">Images (multi)</label>

                    <input id="imagesInput" type="file" name="images[]" multiple accept="image/*"
                        class="mt-1 block w-full">

                    <input type="hidden" name="main_image_index" id="mainImageIndex" value="">
                    <div id="imagesPreview" class="preview-grid"></div>

                    <p class="text-xs opacity-70 mt-2">
                        Clique une image pour la définir comme couverture. La croix supprime l'image.
                    </p>
                </div>



                <!-- <div>
                    <label class="block text-sm font-medium">Image</label>
                    
                    <input type="file" name="img_pic"
                           class="mt-1 block w-full">
                </div> -->

                <div class="flex justify-end">
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500">
                        Créer
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
  const mainHidden = document.getElementById('mainImageIndex');
  const form = preview.closest('form');

  if (!input || !preview || !mainHidden || !form) {
    console.error('[images] éléments introuvables', { input, preview, mainHidden, form });
    return;
  }

  let files = [];        // notre liste stable
  let coverIndex = null; // index dans files

  const syncInputFiles = () => {
    // On recompose un FileList à partir de `files` (sinon suppression impossible)
    const dt = new DataTransfer();
    files.forEach(f => dt.items.add(f));
    input.files = dt.files;
  };

    const render = () => {
    console.log('[images] render', { count: files.length, coverIndex });
    preview.innerHTML = '';

    files.forEach((file, idx) => {
        const card = document.createElement('div');
        card.className = 'preview-card' + (idx === coverIndex ? ' is-cover' : '');
        card.dataset.index = String(idx);

        const img = document.createElement('img');
        img.alt = file.name;

        const reader = new FileReader();
        reader.onload = () => { img.src = reader.result; };
        reader.readAsDataURL(file);

        const del = document.createElement('button');
        del.type = 'button';
        del.className = 'preview-del';
        del.textContent = '×';
        del.dataset.action = 'delete';

        card.appendChild(img);
        card.appendChild(del);

        // ✅ BADGE IMAGE DE COUVERTURE
        if (idx === coverIndex) {
        const badge = document.createElement('div');
        badge.className = 'cover-badge';
        badge.textContent = 'Image couverture';
        card.appendChild(badge);
        }

        preview.appendChild(card);
    });

    mainHidden.value = (coverIndex === null) ? '' : String(coverIndex);
    };


  input.addEventListener('change', () => {
    files = Array.from(input.files || []);
    if (files.length && coverIndex === null) coverIndex = 0; // défaut: première
    syncInputFiles();
    render();
  });

  preview.addEventListener('click', (e) => {
    const del = e.target.closest('[data-action="delete"]');
    const card = e.target.closest('.preview-card');
    if (!card) return;

    const idx = Number(card.dataset.index);

    if (del) {
      // SUPPRIMER
      files.splice(idx, 1);

      // ajuste cover
      if (coverIndex === idx) coverIndex = files.length ? 0 : null;
      else if (coverIndex !== null && coverIndex > idx) coverIndex--;

      syncInputFiles();
      render();
      return;
    }

    // SELECTION COUVERTURE
    coverIndex = idx;
    render();
  });

  form.addEventListener('submit', (e) => {
    // obligatoire d’avoir une cover
    if (coverIndex === null || files.length === 0) {
      e.preventDefault();
      alert("Choisis une image de couverture (clique une image).");
      return;
    }
  });

  console.log('[images] script OK');
})();
</script>


<script>
document.querySelector('form').addEventListener('submit', (e) => {
    if (mainIndex === null) {
        alert("Veuillez sélectionner une image de couverture");
        e.preventDefault();
    }
});
</script>

