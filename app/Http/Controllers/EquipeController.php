<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    // 🔴 ADMIN - LISTE
    public function index()
    {
        $equipes = Equipe::latest()->get();
        return view('admin.equipes.index', compact('equipes'));
    }

    // 🔴 STORE (AJOUT)
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp',
            'bio' => 'nullable|string',
            'role' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['nom', 'bio', 'role']);

        // upload image
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('equipes', 'public');
        }

        $data['user_id'] = auth()->id(); // 🔥 important

        Equipe::create($data);

        return back()->with('success', 'Membre ajouté avec succès');
    }

    // 🟢 VITRINE (PAGE TEAM)
    public function vitrine()
    {
        $equipes = Equipe::latest()->get();
        return view('sections.vitrine.equipe', compact('equipes'));
    }
}
