@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

    @include("sections.admin.menuHaut")
    @include("sections.admin.menuGauche")

    <div id="content" class="content">

        <div class="container py-4">

            <h2 class="mb-4 text-center">
                Gestion Bibliothèque SSMA
            </h2>

            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif

            {{-- FORM --}}
            <div class="card shadow-sm mb-5">

                <div class="card-body">

                    <form action="{{ route('admin.books.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            {{-- TITLE --}}
                            <div class="col-md-6 mb-3">

                                <label>Titre</label>

                                <input type="text"
                                    name="title"
                                    class="form-control"
                                    required>

                            </div>

                            {{-- AUTEUR --}}
                            {{-- <div class="col-md-6 mb-3">

                                <label>Auteur</label>

                                <input type="text"
                                    name="auteur"
                                    class="form-control"
                                    required>

                            </div> --}}

                            {{-- TYPE --}}
                            <div class="col-md-6 mb-3">

                                <label>Type</label>

                                <select name="type"
                                        class="form-control">

                                    <option value="Pdf">
                                        PDF
                                    </option>

                                    <option value="Audio">
                                        Audio
                                    </option>

                                </select>

                            </div>

                            {{-- COVER --}}
                            <div class="col-md-6 mb-3">

                                <label>Cover</label>

                                <input type="file"
                                    name="cover"
                                    class="form-control">

                            </div>

                            {{-- FILE --}}
                            <div class="col-md-12 mb-3">

                                <label>Fichier</label>

                                <select name="auteur_id"
                                        class="form-control mb-3"
                                        required>

                                    <option value="">
                                        Choisir auteur
                                    </option>

                                    @foreach($auteurs as $auteur)

                                        <option value="{{ $auteur->id }}">

                                            {{ $auteur->nom }}

                                        </option>

                                    @endforeach

                                </select>

                                <input type="file" name="file" class="form-control" required>

                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="col-md-12 mb-3">

                                <label>Description</label>

                                <textarea name="description"
                                        class="form-control"></textarea>

                            </div>

                        </div>

                        <button class="btn btn-success">

                            Ajouter Book

                        </button>

                    </form>

                </div>

            </div>

            {{-- LIST --}}
            <div class="row">

                @foreach($books as $book)

                    <div class="col-md-3 mb-4">

                        <div class="card shadow-sm h-100">

                            {{-- COVER --}}
                            @if($book->cover)

                                <img src="{{ asset('storage/'.$book->cover) }}"
                                    class="card-img-top"
                                    style="height:250px;object-fit:cover;">

                            @endif

                            <div class="card-body">

                                <h5>{{ $book->title }}</h5>

                                <small>
                                    {{ $book->auteur }}
                                </small>

                                <br><br>

                                <span class="badge bg-dark">
                                    {{ $book->type }}
                                </span>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>
</div>

@include("sections.admin.script")

</body>
</html>
