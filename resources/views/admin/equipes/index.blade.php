@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container">

@include("sections.admin.menuHaut")
@include("sections.admin.menuGauche")

<div id="content" class="content">

    <div class="container">

        <h2 class="text-center mb-4">Gestion Équipe</h2>

        <form method="POST" action="{{ route('admin.equipes.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                </div>

                <div class="col-md-3">
                    <input type="text" name="role" class="form-control" placeholder="Rôle">
                </div>

                <div class="col-md-3">
                    <input type="file" name="photo" class="form-control" required>
                </div>
            </div>

            <textarea name="bio" class="form-control mt-2" placeholder="Bio"></textarea>

            <button class="btn btn-primary mt-3">Ajouter</button>
        </form>

        <hr>

        <div class="row">
        @foreach($equipes as $e)
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <img src="{{ asset('storage/'.$e->photo) }}" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5>{{ $e->nom }}</h5>
                        <small>{{ $e->role }}</small>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    </div>

</div>

@include("sections.admin.script")

</body>
</html>
