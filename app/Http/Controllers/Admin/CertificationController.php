<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    public function index()
    {
        return view('admin.certifications.index', [
            'certifications' => Certification::orderByDesc('obtained_at')->get()
        ]);
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image|max:51200',
            'short_description' => 'required|string|max:255',
            'obtained_at' => 'required|date',
            'external_url' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('certifications', 'public');
        }

        Certification::create($data);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification ajoutée');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|image|max:51200',
            'short_description' => 'required|string|max:255',
            'obtained_at' => 'required|date',
            'external_url' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            if ($certification->logo) {
                Storage::disk('public')->delete($certification->logo);
            }
            $data['logo'] = $request->file('logo')->store('certifications', 'public');
        }

        $certification->update($data);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification mise à jour');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->logo) {
            Storage::disk('public')->delete($certification->logo);
        }

        $certification->delete();

        return redirect()->back()->with('success', 'Certification supprimée');
    }
}