<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rate;

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

        return view('home', [
            'projectune' => $projectune,
            'projects'   => $projects,
            'rates'      => $rates,
        ]);
    }
}
