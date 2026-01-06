<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RateController extends Controller
{
    public function index()
    {
        return view('admin.rates.index', [
            'rates' => Rate::orderByDesc('date')->get()
        ]);
    }

    public function create()
    {
        return view('admin.rates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'meeting'     => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'avatar'      => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('rates', 'public');
        }

        Rate::create($data);

        return redirect()->route('admin.rates.index')->with('success', 'Avis ajouté');
    }

    public function edit(Rate $rate)
    {
        return view('admin.rates.edit', compact('rate'));
    }

    public function update(Request $request, Rate $rate)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'meeting'     => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'avatar'      => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('avatar')) {
            if ($rate->avatar) {
                Storage::disk('public')->delete($rate->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('rates', 'public');
        }

        $rate->update($data);

        return redirect()->route('admin.rates.index')->with('success', 'Avis modifié');
    }

    public function destroy(Rate $rate)
    {
        if ($rate->avatar) {
            Storage::disk('public')->delete($rate->avatar);
        }

        $rate->delete();

        return redirect()->route('admin.rates.index')->with('success', 'Avis supprimé');
    }
}
