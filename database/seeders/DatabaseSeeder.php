<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Contact;
use App\Models\Equipe;
use App\Models\Event;
use App\Models\Media;
use App\Models\Membre;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    // ADMIN 1
    User::create([
        'nom' => 'Admin Principal',
        'email' => 'admin@ssma.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);

    // ADMIN 2
    User::create([
        'nom' => 'Super Admin',
        'email' => 'superadmin@ssma.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);
    // Users
    User::factory(1)->create();

    // Events
    Event::factory(1)->create();

    // Membres
    Membre::factory(1)->create();

    // Media (liés aux users + events)
    Media::factory(1)->create();

    // Books
    Book::factory(1)->create();

    // Contacts
    Contact::factory(1)->create();

    // Equipe
    Equipe::factory(1)->create();
}
}
