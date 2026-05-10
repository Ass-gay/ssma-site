<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    // ADMIN
    public function index()
    {
        $auteurs = Auteur::latest()->get();

        return view(
            'admin.auteurs.index',
            compact('auteurs')
        );
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([

            'nom' => 'required',

            'photo' => 'nullable|image',

            'bio' => 'nullable',

        ]);

        $data = [

            'nom' => $request->nom,

            'bio' => $request->bio,

        ];

        // PHOTO
        if($request->hasFile('photo')){

            $data['photo'] = $request
                ->file('photo')
                ->store('auteurs', 'public');
        }

        Auteur::create($data);

        return back()->with(
            'success',
            'Auteur ajouté avec succès'
        );
    }
}