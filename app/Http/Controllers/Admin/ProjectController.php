<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::orderByDesc('date')->get()
        ]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',
        'date' => 'required|date',
        'link' => 'nullable|url',

        'images' => 'required|array|min:1',
        'images.*' => 'image|max:4096',
        'main_image_index' => 'required|integer|min:0',
    ]);

    // 1️⃣ créer le projet SANS img_pic
    $project = Project::create([
        'title' => $data['title'],
        'slug' => Str::slug($data['title']),
        'description' => $data['description'],
        'content' => $data['content'],
        'date' => $data['date'],
        'link' => $data['link'] ?? null,
        'img_pic' => null,
    ]);

    $coverIndex = (int) $request->main_image_index;
    $images = $request->file('images');

    if (!isset($images[$coverIndex])) {
        return back()->withErrors(['images' => 'Image de couverture invalide']);
    }

    // 2️⃣ stocker toutes les images
    foreach ($images as $i => $image) {
        $path = $image->store('projects', 'public');

        $project->images()->create([
            'path' => $path,
        ]);

        // 3️⃣ si image couverture → img_pic
        if ($i === $coverIndex) {
            $project->img_pic = $path;
        }
    }

    // 4️⃣ sauver img_pic
    $project->save();

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Projet ajouté');
}


    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'date' => 'required|date',
            'link' => 'nullable|url',

            // images
            'images.*' => 'image|max:4096',
            'main_image_index' => 'required',
            'deleted_images' => 'nullable',
        ]);

        // 🔹 Mise à jour des champs texte
        $project->update([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']),
            'description' => $data['description'],
            'content' => $data['content'],
            'date' => $data['date'],
            'link' => $data['link'] ?? null,
        ]);

        // 🔴 SUPPRESSION des images existantes
        $deletedIds = json_decode($request->deleted_images, true) ?? [];

        foreach ($deletedIds as $id) {
            $img = $project->images()->find($id);
            if ($img) {
                Storage::disk('public')->delete($img->path);
                $img->delete();
            }
        }

        // 🟢 AJOUT des nouvelles images
        $newImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $newImages[] = $project->images()->create([
                    'path' => $file->store('projects', 'public'),
                ]);
            }
        }

        // 🟣 GESTION IMAGE DE COUVERTURE
        $cover = json_decode($request->main_image_index, true);

        if (!$cover || !isset($cover['type'])) {
            return back()->withErrors(['cover' => 'Image de couverture requise']);
        }

        // couverture = image existante
        if ($cover['type'] === 'existing') {
            $img = $project->images()->find($cover['id']);
            if ($img) {
                $project->img_pic = $img->path;
            }
        }

        // couverture = nouvelle image
        if ($cover['type'] === 'new') {
            if (!isset($newImages[$cover['index']])) {
                return back()->withErrors(['cover' => 'Image de couverture invalide']);
            }
            $project->img_pic = $newImages[$cover['index']]->path;
        }

        $project->save();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Projet modifié avec succès');
    }


    public function destroy(Project $project)
    {
        Storage::disk('public')->delete($project->img_pic);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé');
    }
}
