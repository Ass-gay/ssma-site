<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\UserController;
use App\Models\Media;
use App\Models\Equipe;
use App\Models\Membre;
use App\Models\Event;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| ACCUEIL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $media = Media::latest()->take(6)->get();
    $equipes = Equipe::latest()->get(); // 🔥 AJOUT ICI
    $membresCount = Membre::count();
    $eventsCount = Event::count();
    $mediaCount = Media::count();
    $mediaGalerie = Media::latest()->take(10)->get();
    return view('welcome', compact(
        'media',
        'equipes',
        'membresCount',
        'eventsCount',
        'mediaCount',
        'mediaGalerie'
    ));
})->name('home');




Route::get('/apropos', function () {

    $membres = Membre::count();
    $events = Event::count();
    $media = Media::count();
    $mediaGalerie = Media::latest()->take(10)->get();

    $equipes = Equipe::latest()->get();

    $membresCount = Membre::count();
    $eventsCount = Event::count();
    $mediaCount = Media::count();

    return view('sections.vitrine.apropo', compact(
        'membres',
        'events',
        'media',
        'mediaGalerie',
        'equipes',
        'membresCount',
        'eventsCount',
        'mediaCount'
    ));

})->name('apropos');

/*
|--------------------------------------------------------------------------
| EVENTS
|--------------------------------------------------------------------------
*/

Route::get('/events', [EventController::class, 'vitrine'])->name('events.vitrine');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

/*
|--------------------------------------------------------------------------
| MEDIA (VITRINE)
|--------------------------------------------------------------------------
*/

Route::get('/media', [MediaController::class, 'vitrine'])->name('media.vitrine');
Route::get('/media/{id}', [MediaController::class, 'show'])->name('media.show');

/*
|--------------------------------------------------------------------------
| BOOKS
|--------------------------------------------------------------------------
*/

Route::get('/books', [BookController::class, 'vitrine'])->name('books.vitrine');

// PAGE AUTEURS
Route::get('/books', [BookController::class, 'auteurs'])->name('books.auteurs');

// PAGE D’UN AUTEUR
Route::get('/books/auteur/{id}', [BookController::class, 'auteur'])->name('books.auteur');

// LECTURE PDF
Route::get('/books/read/{id}', [BookController::class, 'read'])->name('books.read');

// DOWNLOAD
Route::get('/books/download/{id}', [BookController::class, 'download']) ->name('books.download');

// VIEW PDF
Route::get('/pdf/view/{id}', [BookController::class, 'viewPdf']) ->name('books.viewPdf');
/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/
// Pour Contact
Route::get('/contact', function () {

    return view('sections.vitrine.contact');

})->name('contact');

Route::post('/contact', [ContactController::class, 'storePublic'])->name('contact.public');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

/*
|--------------------------------------------------------------------------
| EQUIPE
|--------------------------------------------------------------------------
*/
Route::get('/equipe', [EquipeController::class, 'vitrine'])->name('equipe.vitrine');


/*
|--------------------------------------------------------------------------
| MEMBRES
|--------------------------------------------------------------------------
*/

Route::get('/membres', [MembreController::class, 'index'])->name('membres.index');

Route::post('/members', [MembreController::class, 'store'])->name('members.store');

Route::post('/membre/{id}/accepter', [MembreController::class, 'accepter'])->name('membre.accepter');
Route::post('/membre/{id}/refuser', [MembreController::class, 'refuser'])->name('membre.refuser');
Route::post('/membre/{id}/en_attente', [MembreController::class, 'en_attente'])->name('membre.en_attente');

/*
|--------------------------------------------------------------------------
| PAGES ADHÉSION
|--------------------------------------------------------------------------
*/

Route::get('/devenir-membre', fn() => view('members.rules'))->name('members.rules');

Route::get('/devenir-membre/formulaire', fn() => view('members.form'))->name('members.form');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))
        ->name('dashboard');

    Route::resource('membres', MembreController::class)
        ->only(['index', 'show', 'destroy']);

    Route::resource('media', MediaController::class);
    Route::resource('books', BookController::class);
    Route::resource('events', EventController::class);
    Route::resource('equipes', EquipeController::class)->only(['index','store']);

    Route::resource('contacts', ContactController::class)
        ->only(['index', 'show', 'destroy']);

    // Routes pour les contacts
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('/contacts/{contact}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::patch('/contacts/{contact}/reply', [ContactController::class, 'markAsAnswered'])->name('contacts.reply');


    Route::resource('auteurs', AuteurController::class)->only(['index', 'store']);

    Route::resource('users', UserController::class)->only(['index','store']);

        Route::get('dashboard', function () {
        $membresCount = Membre::count();
        $eventsCount = Event::count();
        $mediasCount = Media::count();
        $booksCount = Book::count();
        return view('admin.dashboard', compact(
            'membresCount',
            'eventsCount',
            'mediasCount',
            'booksCount',
        ));
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
