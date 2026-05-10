<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Membre;
use App\Models\Media;
use App\Models\Book;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $membres = Membre::count();

        $medias = Media::count();

        $books = Book::count();

        $events = Event::count();

        return view(
            'admin.dashboard',
            compact(
                'membres',
                'medias',
                'books',
                'events'
            )
        );
    }
}