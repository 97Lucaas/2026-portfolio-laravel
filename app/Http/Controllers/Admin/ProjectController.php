<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'date' => 'required|date',
            'link' => 'nullable|url',
            'img_pic' => 'required|image|max:4096',
        ]);

        // upload image
        $data['img_pic'] = $request->file('img_pic')->store('projects', 'public');

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Projet ajouté');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'link' => 'nullable|url',
            'img_pic' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('img_pic')) {
            Storage::disk('public')->delete($project->img_pic);
            $data['img_pic'] = $request->file('img_pic')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Projet modifié');
    }

    public function destroy(Project $project)
    {
        Storage::disk('public')->delete($project->img_pic);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé');
    }
}
