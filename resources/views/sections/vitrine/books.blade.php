@extends('layouts.app')

@section('content')

    <section class="books-section">

        <div class="container">

            {{-- TITLE --}}
            <div class="section-title text-center mb-5">

                <h2>
                    {{ $auteur->nom }}
                </h2>

                <p>
                    Bibliothèque de l’auteur
                </p>

            </div>

            {{-- BOOKS --}}
            <div class="books-slider">

                @forelse($auteur->books as $book)

                    <div class="book-item">

                        <div class="book-card">

                            {{-- COVER --}}
                            @if($book->cover)

                                <img src="{{ asset('storage/'.$book->cover) }}"
                                    class="book-cover">

                            @endif

                            <div class="book-content">


                                {{-- TITLE --}}
                                <h4>

                                    {{ $book->title }}

                                </h4>

                                <a href="{{ route('books.auteur', $book->auteur->id) }}"
                                    class="author-link">

                                    {{ $book->auteur->nom }}

                                </a>

                                {{-- DESCRIPTION --}}
                                <p>

                                    {{ Str::limit($book->description, 90) }}

                                </p>

                                {{-- PDF --}}
                                @if($book->type == 'Pdf')

                                    <a href="{{ route('books.read', $book->id) }}"
                                        class="btn-book btn-pdf">

                                        <i class="fa-solid fa-book-open"></i>
                                        Lire PDF

                                    </a>

                                    <a href="{{ route('books.download', $book->id) }}"
                                        class="btn-download">

                                        <i class="fa-solid fa-download"></i>
                                        Télécharger

                                    </a>
                                @endif


                                {{-- AUDIO --}}
                                @if($book->type == 'Audio')

                                    <div class="audio-player">

                                        {{-- COVER --}}
                                        @if($book->cover)

                                            <img src="{{ asset('storage/'.$book->cover) }}"
                                                class="audio-cover">

                                        @endif

                                        <div class="audio-content">

                                            <h5>{{ $book->title }}</h5>

                                            <small>{{ $book->auteur->nom }}</small>

                                            <audio controls class="premium-audio">

                                                <source src="{{ asset('storage/'.$book->file) }}">

                                            </audio>

                                        </div>

                                    </div>

                                    <a href="{{ route('books.download', $book->id) }}"
                                        class="btn-download">

                                            Télécharger Audio

                                    </a>
                                @endif


                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center">

                        <p>Aucun livre disponible</p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

@endsection
