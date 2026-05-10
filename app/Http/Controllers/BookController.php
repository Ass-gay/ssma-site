<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Auteur;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // ADMIN
    public function index()
    {
        $books = Book::latest()->get();
        $auteurs = Auteur::latest()->get();

        return view('admin.books.index', compact('books', 'auteurs'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'type' => 'required',

            'file' => 'required',

            'cover' => 'nullable|image',

            'auteur_id' => 'required',

        ]);

        // FILE
        $file = $request->file('file')
            ->store('books/files', 'public');

        // COVER
        $cover = null;

        if ($request->hasFile('cover')) {

            $cover = $request->file('cover')
                ->store('books/covers', 'public');
        }

        Book::create([

            'title' => $request->title,

            'description' => $request->description,

            'cover' => $cover,

            'file' => $file,

            'type' => $request->type,

            'auteur_id' => $request->auteur_id,

            'user_id' => auth()->id(),

        ]);

        return back()->with(
            'success',
            'Book ajouté avec succès'
        );
    }

    // VITRINE BOOKS
    public function vitrine()
    {
        $books = Book::with('auteur')
            ->latest()
            ->get();

        return view(
            'sections.vitrine.books',
            compact('books')
        );
    }

    // LISTE AUTEURS
    public function auteurs(Request $request)
    {
        $search = $request->search;

        $auteurs = Auteur::when($search, function ($query) use ($search) {

                $query->where(
                    'nom',
                    'like',
                    '%' . $search . '%'
                );

            })
            ->latest()
            ->get();

        return view(
            'sections.vitrine.auteurs',
            compact('auteurs', 'search')
        );
    }

    // PAGE AUTEUR
    public function auteur($id)
    {
        $auteur = Auteur::with('books')
            ->findOrFail($id);

        return view(
            'sections.vitrine.auteur-books',
            compact('auteur')
        );
    }

    // LIRE PDF
    public function read($id)
    {
        $book = Book::findOrFail($id);

        return view(
            'sections.vitrine.read-book',
            compact('book')
        );
    }

    // TELECHARGER
    public function download($id)
    {
        $book = Book::findOrFail($id);

        return response()->download(
            storage_path('app/public/' . $book->file)
        );
    }

    public function viewPdf($id)
    {
        $book = Book::findOrFail($id);

        return response()->file(
            storage_path('app/public/'.$book->file)
        );
    }
}
