@include("sections.admin.head")

<body>
@include("sections.admin.loader")

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

    @include("sections.admin.menuHaut")
    @include("sections.admin.menuGauche")

    <div id="content" class="content">

        <div class="container">

            <h2 class="mb-4">
                Gestion Auteurs
            </h2>

            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            {{-- FORM --}}
            <div class="card mb-4">

                <div class="card-body">

                    <form method="POST"
                        action="{{ route('admin.auteurs.store') }}"
                        enctype="multipart/form-data">

                        @csrf

                        <input type="text"
                            name="nom"
                            class="form-control mb-3"
                            placeholder="Nom auteur">

                        <input type="file"
                            name="photo"
                            class="form-control mb-3">

                        <textarea name="bio"
                                class="form-control mb-3"
                                placeholder="Biographie"></textarea>

                        <button class="btn btn-success">

                            Ajouter Auteur

                        </button>

                    </form>

                </div>

            </div>

            {{-- LISTE --}}
            <div class="row">

                @foreach($auteurs as $auteur)

                    <div class="col-md-4 mb-4">

                        <div class="card shadow-sm">

                            @if($auteur->photo)

                                <img src="{{ asset('storage/'.$auteur->photo) }}"
                                    style="height:250px; object-fit:cover;"
                                    class="card-img-top">

                            @endif

                            <div class="card-body">

                                <h5>{{ $auteur->nom }}</h5>

                                <p>{{ $auteur->bio }}</p>

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