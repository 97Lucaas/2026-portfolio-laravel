<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rate;
use App\Models\Certification;

class HomeController extends Controller
{
    public function index()
    {
        $projectune = Project::orderByDesc('date')->first();
        $projects = Project::orderByDesc('date')
            ->limit(1000) // ou un nombre largement suffisant
            ->offset(1)
            ->get();
        $rates = Rate::orderByDesc('date')->get();
        $certifications = Certification::orderByDesc('obtained_at')->get();

        return view('home', [
            'projectune' => $projectune,
            'projects'   => $projects,
            'rates'      => $rates,
            'certifications' => $certifications,
        ]);
    }
}
