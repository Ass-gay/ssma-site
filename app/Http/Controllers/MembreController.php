<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;

class MembreController extends Controller
{
    public function index()
    {
        $membres = Membre::orderByDesc('created_at')->paginate(10);

        return view('admin.membres.index', compact('membres'));
    }

    public function store(StoreMemberRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        // statut par défaut si l'utilisateur n'envoie rien
        $data['status'] = $data['status'] ?? 'en_attente';

        Membre::create($data);

        return redirect()
            ->route('members.form')
            ->with('success', 'Membre enregistré avec succès');
    }

    public function accepter($id)
    {
        $membre = Membre::findOrFail($id);
        $membre->status = 'accepte';
        $membre->save();

        return back()->with('success', 'Membre accepté');
    }

    public function refuser($id)
    {
        $membre = Membre::findOrFail($id);
        $membre->status = 'refuse';
        $membre->save();

        return back()->with('success', 'Membre refusé');
    }

    public function en_attente($id)
    {
        $membre = Membre::findOrFail($id);
        $membre->status = 'en_attente';
        $membre->save();

        return back()->with('success', 'Membre mis en attente');
    }
}
