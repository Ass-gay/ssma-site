<!DOCTYPE html>
<html lang="en">

@include("sections.vitrine.head")

<body class="index-page">

@include("sections.vitrine.header")

<main class="main">

<section class="author-page">

    <div class="container">

        {{-- HEADER --}}
        <div class="author-header">

            @if($auteur->photo)

                <img src="{{ asset('storage/'.$auteur->photo) }}"
                     class="author-photo"
                     alt="{{ $auteur->nom }}">

            @endif

            <div class="author-info">

                <h1>{{ $auteur->nom }}</h1>

                <p>{{ $auteur->bio }}</p>

                <span class="author-count">

                    {{ $auteur->books->count() }}
                    livres / audio

                </span>

            </div>

        </div>

        {{-- BOOKS --}}
        <div class="row mt-5">

            @foreach($auteur->books as $book)

                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="book-card">

                        {{-- TYPE --}}
                        <span class="book-type">

                            {{ $book->type }}

                        </span>

                        {{-- COVER --}}
                        @if($book->cover)

                            <img src="{{ asset('storage/'.$book->cover) }}"
                                 class="book-cover"
                                 alt="{{ $book->title }}">

                        @endif

                        <div class="book-content">

                            <h5>

                                {{ $book->title }}

                            </h5>

                            <p>

                                {{ Str::limit($book->description, 90) }}

                            </p>

                            {{-- PDF --}}
                            @if($book->type == 'Pdf')

                                <a href="{{ asset('storage/'.$book->file) }}"
                                target="_blank"
                                class="btn-book btn-pdf">

                                    <i class="fa-solid fa-book-open"></i>

                                    Lire PDF

                                </a>

                                <a href="{{ route('books.download', $book->id) }}"
                                class="btn-book btn-download">

                                    <i class="fa-solid fa-download"></i>

                                    Télécharger

                                </a>

                            @endif

                            {{-- AUDIO --}}
                            @if($book->type == 'Audio')

                                <audio controls class="audio-player">

                                    <source src="{{ asset('storage/'.$book->file) }}">

                                </audio>

                                <a href="{{ route('books.download', $book->id) }}"
                                class="btn-book btn-download">

                                    <i class="fa-solid fa-headphones"></i>

                                    Télécharger Audio

                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

</main>



@include("sections.vitrine.footer")
@include("sections.vitrine.scroll")
@include("sections.vitrine.script")

</body>
</html>
