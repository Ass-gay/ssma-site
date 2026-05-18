<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::latest()->get();

        return view(
            'admin.sections.index',
            compact('sections')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'nom' => 'required|string|max:255',

            'type' => 'required|in:regionale,departementale,diaspora',

        ]);

        Section::create([

            'nom' => $request->nom,

            'type' => $request->type,

        ]);

        return back()->with(
            'success',
            'Section ajoutée avec succès'
        );
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);

        $section->delete();

        return back()->with(
            'success',
            'Section supprimée avec succès'
        );
    }
}
