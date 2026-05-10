<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Event;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    // 🔴 ADMIN - LISTE DES MEDIA
    public function index()
    {
        $media = Media::with('event')->latest()->get();
        $events = Event::latest()->get();

        return view('admin.media.index', compact('media', 'events'));
    }

    // PAGE MEDIA (VITRINE)
    public function vitrine(Request $request)
    {
        $events = Event::with(['media' => function ($q) {
            $q->orderByDesc('created_at');
        }])->orderByDesc('created_at')->get();

        return view('sections.vitrine.media', compact('events'));
    }

    // DETAIL MEDIA
    public function show(int $id)
    {
        $media = Media::with('event')->findOrFail($id);

        return view('sections.media.show', [
            'media' => $media
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required',
            'event_id' => 'required|exists:events,id',
            'type' => 'required'
        ]);

        foreach ($request->file('files') as $file) {

            $path = $file->store('media', 'public');

            Media::create([
                'file' => $path,
                'type' => $request->type,
                'event_id' => $request->event_id,

                // 👇 ICI tu ajoutes user_id
                'user_id' => 1, // test temporaire
            ]);
        }

        return back()->with('success', 'Média ajouté avec succès');
    }
}
