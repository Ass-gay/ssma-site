@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container">

@include("sections.admin.menuHaut")
@include("sections.admin.menuGauche")

<div id="content" class="content">

<div class="container">

    <h2 class="text-center mb-4">Gestion Events SSMA</h2>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- ================= CREATE EVENT ================= --}}
    <div class="card mb-4">
        <div class="card-body">

            <form action="{{ route('admin.events.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- TITLE --}}
                    <div class="col-md-3">
                        <input type="text" name="title"
                               class="form-control"
                               placeholder="Titre event" required>
                    </div>

                    {{-- DATE --}}
                    <div class="col-md-3">
                        <input type="date" name="date_event"
                               class="form-control">
                    </div>

                    {{-- TYPE (🔥 AJOUTÉ) --}}
                    <div class="col-md-3">
                        <select name="type" class="form-control" required>
                            <option value="">Type event</option>
                            <option value="Gamou">Gamou</option>
                            <option value="Ziar">Ziar</option>
                            <option value="Autres">Autres</option>
                        </select>
                    </div>

                    {{-- PHOTO --}}
                    <div class="col-md-3">
                        <input type="file" name="photo"
                               class="form-control">
                    </div>

                </div>

                {{-- DESCRIPTION --}}
                <textarea name="description"
                          class="form-control mt-2"
                          placeholder="Description"></textarea>

                <button class="btn btn-primary mt-3">
                    Ajouter Event
                </button>

            </form>

        </div>
    </div>

    {{-- ================= LIST EVENTS ================= --}}
    <div class="row">

        @foreach($events as $event)

            <div class="col-md-4 mb-3">

                <div class="card shadow-sm">

                    {{-- COVER --}}
                    @php
                        $cover = $event->media->first();
                    @endphp

                    @if($cover)
                        @if($cover->type == 'image')
                            <img src="{{ asset('storage/'.$cover->file) }}"
                                 class="card-img-top"
                                 style="height:200px; object-fit:cover;">
                        @else
                            <video class="card-img-top" style="height:200px;">
                                <source src="{{ asset('storage/'.$cover->file) }}">
                            </video>
                        @endif
                    @endif

                    <div class="card-body text-center">

                        <h5>{{ $event->title }}</h5>

                        {{-- 🔥 TYPE AFFICHÉ --}}
                        <span class="badge bg-dark">
                            {{ $event->type }}
                        </span>

                        <br><br>

                        <small>{{ $event->media->count() }} médias</small>

                        <br>

                        <a href="{{ route('events.show', $event->id) }}"
                           class="btn btn-dark btn-sm mt-2">
                            Voir album
                        </a>

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
