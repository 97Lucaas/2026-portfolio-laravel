<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show(string $slug)
    {
        $projectune = Project::orderByDesc('date')->first();
        $project = Project::with('images')
            ->where('slug', $slug)
            ->whereNull('link') // sécurité : projet interne uniquement
            ->firstOrFail();

        return view('projects.show', ["project" => $project, "projectune" => $projectune]);
    }
}
