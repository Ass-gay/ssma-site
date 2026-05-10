<!DOCTYPE html>
<html lang="fr">

@include("sections.vitrine.head")

<body class="index-page">

@include("sections.vitrine.header")

<main class="main">

    <section class="authors-section">

        <div class="container">

            <div class="container section-title text-center">
                <h2>Bibliothèque SSMA</h2>
                <p class="mb-1">Découvrez les auteurs et leurs ouvrages</p>
            </div>


            {{-- SEARCH --}}
            <div class="search-box mb-5">

                <form method="GET"
                    action="{{ route('books.auteurs') }}">

                    <div class="input-group">

                        <input type="text"
                            name="search"
                            class="form-control"
                            placeholder="Rechercher auteur ou livre..."
                            value="{{ request('search') }}">

                        <button class="btn-search">

                            Rechercher

                        </button>

                    </div>

                </form>

            </div>

            <div class="row">

                @forelse($auteurs as $auteur)

                    <div class="col-lg-3 col-md-6 mb-4">

                        <div class="author-card">

                            {{-- Photo --}}
                            @if($auteur->photo)

                                <img src="{{ asset('storage/'.$auteur->photo) }}"
                                    class="author-img"
                                    alt="{{ $auteur->nom }}">

                            @endif

                            <div class="author-content">

                                <h4>
                                    {{ $auteur->nom }}
                                </h4>

                                <a href="{{ route('books.auteur', $auteur->id) }}"
                                class="btn-author">

                                    Voir bibliothèque

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center">

                        <p>Aucun auteur disponible</p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

    @include("sections.vitrine.footer")

</main>

</body>
</html>
